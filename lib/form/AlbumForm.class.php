<?php

/**
 * Album form.
 *
 * @package    armenian.loc
 * @subpackage form
 * @author     Your name here
 */
class AlbumForm extends BaseAlbumForm {

    public function configure() {

        /*
         * Создаем видежт и валидатор для обложки
         */
        unset($this['created_at']);
        unset($this['updated_at']);
        unset($this['cover_image']);
        unset($this['album_has_image_list']);


        $this->widgetSchema['cover_image']           = new sfWidgetFormInputFileEditable(array(
            'edit_mode'    => false == $this->isNew,
            'is_image'     => true,
            'delete_label' => 'Удалить изображние',
            'file_src'     => $this->getImagePath(),
            'with_delete'  => $this->getWithDelete(),
        ));
        $this->validatorSchema['cover_image']        = new myValidatorImage(array('required' => true));
        $this->validatorSchema['cover_image_delete'] = new sfValidatorPass(array('required' => false));
        /*
         * Создаем видежт и валидатор для картинок галереи
         */
        $this->widgetSchema['images']                = new myWidgetFormImages();
        $this->validatorSchema['images']             = new myValidatorAlbumImage();
    }

    public function updateDefaultsFromObject() {
        parent::updateDefaultsFromObject();

        if (!$this->isNew) {

            $hash  = array();
            $title = array();
            $ids   = array();
            $albId = $this->getObject()->getId();
            $stm   = Propel::getConnection()->prepare
                    ('
                    SELECT
                        img.hash,
                        img.title,
                        img.id
                    FROM
                        album_has_image ahi 
                    INNER JOIN image img ON img.id = ahi.image_id
                    WHERE
                        ahi.album_id = :id
                 ');
            $stm->bindParam(':id', $albId);
            $stm->execute();
            $album = $stm->fetchAll(PDO::FETCH_NUM);
            if (is_array($album)) {
                foreach ($album as $item) {
                    $hash[]  = $item[0];
                    $title[] = $item[1];
                    $ids[]   = $item[2];
                }

                $this->setDefault('images', array(
                    'current' => array(
                        'hash'  => $hash,
                        'title' => $title,
                        'ids'   => $ids)
                ));
            }
        }
    }

    /**
     * sets field for cover image deleting if our form isnt new nad have cover_image
     * @return boolean
     */
    protected function getWithDelete() {
        if (false == $this->isNew) {
            if ($this->getObject()->getCoverImage()) {
                return true;
            }
        }
        return false;
    }

    /**
     * creates thumbnails (using our fend module image build srs)
     * @return string
     */
    protected function getImagePath() {
        if (false == $this->isNew) {
            if ($this->getObject()->getCoverImage()) {
                return '/uploads/300/200/' . $this->getObject()->getImage()->getHash();
            }
        }
        return '';
    }

    /**
     * saves our cover image and returns its $id to our form for further saving
     * @param array $values
     * @return array $values
     */
    public function processValues($values) {

        if ($values['cover_image_delete']) {
            $values['cover_image'] = null;
        } elseif ($values['cover_image']['size'] > 0) {
            $values['cover_image'] = $this->doSaveImage($values['cover_image']);
        } elseif (false == $this->isNew && $values['cover_image']['error'] == 4) {
            $values['cover_image'] = $this->getObject()->getCoverImage();
        }else{
            $values['cover_image'] = null;
        }
        return $values;
    }

    /**
     * saves images from our form
     * @param array $values
     * @return array $ids
     */
    protected function saveImages($values) {
        $ids = array();
        foreach ($values as $item) {
            if ($item) {
                $ids[] = $this->doSaveImage($item);
            }
        }
        return $ids;
    }

    /**
     * save new images and its titles and return id for further saving at album_has_image table
     * @param array $images - our form field with set of images
     */
    protected function saveTitlesForNewImages($images) {

        if (isset($images['new']['file'])) {
            $images['new']['ids'] = $this->saveImages($images['new']['file']);
            ImagePeer::setImageTitleById
                    (
                    $images['new']['title'], $images['new']['ids']
            );
        }
        return $images;
    }

    /**
     * save current images and its titles and return id for further saving at album_has_image table
     * @param array $images - our form field with set of images
     */
    protected function saveTitlesForCurrentImages($images) {
        if (isset($images['current']['ids'])) {
            ImagePeer::setImageTitleById
                    (
                    $images['current']['title'], $images['current']['ids']
            );
        }
        return $images;
    }

    /**
     * saving our sets of keys albumid+imageid at album_has_image table
     * @param int $albumId
     * @param array $imagesIds
     */
    protected function saveImageAlbumConnections($albumId, $imagesIds) {
        foreach ($imagesIds as $ids) {
            $item = new AlbumHasImage;
            $item->setAlbumId($albumId);
            $item->setImageId($ids);
            $item->save();
        }
    }

    /**
     * agregating method to using all methods above to save images, titles and 
     * album_images connections
     */
    protected function saveImagesToAlbum() {
        //getting our album id and all values from formfield 'images'
        $albumId = $this->getObject()->getId();
        $images  = $this->getValue('images');

        //then saving our new images(getting ids) and titles for all images
        $images = $this->saveTitlesForCurrentImages($images);
        $images = $this->saveTitlesForNewImages($images);
        //next step destroy all connections at album_has_image for current album
        AlbumHasImagePeer::cleanUp($albumId);
        //and finally save new connections

        foreach ($images as $im) {
            if (isset($im['ids'])) {
                $this->saveImageAlbumConnections($albumId, $im['ids']);
            }
        }
    }

    /**
     * call our saveImagesToAlbum method while saving form
     */
    protected function doSave($con = null) {
        parent::doSave($con);
        $this->saveImagesToAlbum();
        ImagePeer::cleanImagesWithoutConnections();
    }

}
