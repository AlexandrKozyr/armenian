<?php

/**
 * anketa actions.
 *
 * @package    armenian.loc
 * @subpackage anketa
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class anketaActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $params          = $request->getParameter('anketa');
        $file            = $request->getFiles('anketa');
        $anketa          = new AnketaForm;
        $this->recaptcha = true;

        if ($request->isMethod('post')) {
            $anketa->bind($params, $file);
//            $captchaAfterGoogle = $this->getCaptchaResponse($request->getParameter('g-recaptcha-response'));



            $anketa->isValid();


            $this->recaptcha = false;
//            echo "<pre>";
//            var_dump( $anketa->isValid());
//            die;
//            if ($anketa->isValid()) {
//
//                // .. работай позовёшь
//                там просто надо вывести в див с классом еррор тогда всё будет норм
//                mail('bub-mik@ya.ru', 'Тебе сообщение', 'Пользователь ' . $params['name'] . ', оставил сообщение: ' . $params['text']);
//
//                $this->getUser()->setFlash('msg', 'Привет Мир!');
//
//                $this->redirect('@homepage');
//                #$this->redirect('default/index');
//            }
        }
        $this->anketa = $anketa;
    }

    /**
     * 
     * @param string $secretKey - key for google API
     * @param string $postResponse - response for checking at Google server
     * @return object $jresult - resulting object that containe did client pass captcha
     */
    protected function getCaptchaResponse($g_postResponse) {
        $url    = 'https://www.google.com/recaptcha/api/siteverify';
        $params = array(
            'secret'   => '6LdDBwkTAAAAALh5IfPMYDh2cpFNc6vsVdSz4pq8',
            'response' => $g_postResponse,
        );

        $result = file_get_contents($url, false, stream_context_create(array(
            'http' => array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($params)
            )
        )));


        echo "<pre>";
        var_dump($g_postResponse, $result);
        die;

//        $jresult = json_decode($response);
//        return $jresult;
    }

}
