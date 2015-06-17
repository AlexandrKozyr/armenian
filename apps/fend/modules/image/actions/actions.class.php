<?php

/**
 * image actions.
 *
 * @package    armenian.loc
 * @subpackage image
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class imageActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        
    }

    public function executeShow(sfWebRequest $request) {
        $hash = $request->getParameter('hash');

        $criteria = new Criteria;
        $criteria->add(ImagePeer::HASH, $hash);
        $obj = ImagePeer::doSelectOne($criteria);

        $content = base64_decode($obj->getContent());
        $this->getResponse()->setContentType('image/png');

        file_put_contents(sfConfig::get('sf_root_dir') . '/web/uploads/' . $hash, $content);

        return $this->renderText($content);
    }

    //данная фунция занимается ресайзом изображений
    //используя идею добавления прозрачных частей и ресайза без изменения соотношения сторон
    //и без обрезки изображения
    public function executeResize(sfWebRequest $request) {
        $hash = $request->getParameter('hash');
        //необходимые размеры превью, получаем с гет запроса
        $widthTumb = $request->getParameter('x');
        $heightTumb = $request->getParameter('y');
        //ищем изображение по хешу
        $criteria = new Criteria;
        $criteria->add(ImagePeer::HASH, $hash);
        $ourImage = ImagePeer::doSelectOne($criteria);
        //делаем префьшку на имеджике с прозрачным фоном
        //сначала получаем наше изображение в имеджик
        $imagickOurImage = new Imagick();
        $imagickOurImage->readimageblob(base64_decode($ourImage->getContent()));
        //потом делаем заготовку заданого размера прозрачного цвета
        $imagickTumb = new Imagick();
        $imagickTumb->newImage($widthTumb, $heightTumb, new ImagickPixel("black"));
        $imagickTumb->setImageOpacity(0.0);
        $imagickTumb->setImageFormat("png");
        //потом получаем длину и ширину нашего изображения котору будем использовать для оперделения
        //ориентации нашего изображения
        $widthImagickOurImage = $imagickOurImage->getImageWidth();
        $heightImagickOurImage = $imagickOurImage->getImageHeight();
        //дальше проверяем ориентацию нашего изображения если ширина больше высоты
        //или изображение квадратное
        //мы будем добавлять прозрачные части до необходимого размера сверху и снизу
        if ($widthImagickOurImage >= $heightImagickOurImage) {
            //делаем ресайз основнйо картинкипо ширине
            $imagickOurImage->resizeImage($widthTumb, 0, imagick::FILTER_LANCZOS, 1);
            //заново измеряем высоту что бы правильно посчитать необходимый офсет
            $newHeightImagickOurImage = $imagickOurImage->getImageHeight();
            //находим разницу
            $diffTumb = $heightTumb - $newHeightImagickOurImage;
            //склеиваем изображения добавляя получая прозрачные и равномерные части сверху и снизу
            $imagickTumb->compositeImage($imagickOurImage, $imagickOurImage->getImageCompose(), 0, $diffTumb / 2);

            //если нет проделываем аналогичные операции для вертикального изображения
        } else {
            $imagickOurImage->resizeImage(0, $heightTumb, imagick::FILTER_LANCZOS, 1);
            $newWidthImagickOurImage = $imagickOurImage->getImageWidth();
            $diffTumb = $widthTumb - $newWidthImagickOurImage;
            $imagickTumb->compositeImage($imagickOurImage, $imagickOurImage->getImageCompose(), $diffTumb / 2, 0);
        }
        //передаем изображение и сохраняем его в нашу папку аплоадс для дальнейшего использования
        $tumbPicture = $imagickTumb->getImage();

        $this->getResponse()->setContentType('image/png');

        $dir = sfConfig::get('sf_root_dir') . '/web/uploads/' . $widthTumb . '/' . $heightTumb . '/';

        if (false == file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        file_put_contents($dir . $hash, $tumbPicture);
        return $this->renderText($tumbPicture);
    }

}
