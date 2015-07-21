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
        //change headers
//        $kostil = "Союх армян Укрианы";
//        $this->getResponse()->addMeta('description', $kostil . '- привет полякам', false);

        $params          = $request->getParameter('anketa');
        $file            = $request->getFiles('anketa');
        $anketa          = new AnketaForm;
        $this->recaptcha = true;
        if ($request->isMethod('post')) {

            $captchaAfterGoogle = $this->getCaptchaResponse($request->getParameter('g-recaptcha-response'));
            $anketa->bind($params, $file);
            if ($captchaAfterGoogle["success"]) {

                if ($anketa->isValid()) {

                    $anketa->save();
                    $this->sendMail($anketa);
                    $this->redirect('@anketa-confirm');
                }
                $this->anketa = $anketa;
            } else {
                $this->recaptcha = false;
                $this->anketa    = $anketa;
            }
        }
        $this->anketa = $anketa;
    }

    public function executeConfirm() {
        
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

        $result  = file_get_contents($url, false, stream_context_create(array(
            'http' => array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($params)
            )
        )));
        $jresult = json_decode($result, true);
        return $jresult;
    }

    protected function sendMail($anketa) {
        $image_url = 'http://666419.saukr.web.hosting-test.net/' . $this->generateUrl("image-resize", array('x'    => '200',
                    'y'    => '200',
                    'hash' => $anketa->getObject()->getImage()->getHash()));
        $body      = '
            <html>
                        <body>	
                            <table width="100%">
                                <tr>
                                    <td align="center">
                                        <table width="940">
                                            <tr>
                                                <td>
                                                    <br>Здравствуйте!
                                                    <br>Поступила новая анкета на вступление в Союз армян Украины.
                                                    <br>С уважением, администрация сайта САУ г. Кировоград.
                                                    <br>
                                                    <br>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table width="100%">
                                    <tr>
                                            <td align="center">
                                                    <table  style= "background-color: antiquewhite;
                                                                    width: 60%;
                                                                    border: 2px solid brown;
                                                                    font-size: larger;
                                                                    font: -webkit-small-control;">
                                                            <tr style="height: 3em; font-weight: 900;">
                                                                    <td colspan="2" style = "border-bottom: 2px solid brown;
                                                                                             padding: 10px 10px 10px 10px;">
                                                                        Персональные данные
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                    <td style="font-style: italic; font-weight: 600; vertical-align: top; padding: 10px 10px 10px 10px;">
                                                                        Фамилия Имя Отчество :
                                                                    </td>
                                                                    <td>' . $anketa->getObject()->getFio() . '</td>
                                                            </tr>
                                                            <tr>
                                                                    <td style="font-style: italic; font-weight: 600; vertical-align: top; padding: 10px 10px 10px 10px;">
                                                                        Дата рождения :
                                                                    </td>
                                                                    <td>' . $anketa->getObject()->getBirthday() . '</td>
                                                            </tr>
                                                            <tr>
                                                                    <td style="font-style: italic; font-weight: 600; vertical-align: top; padding: 10px 10px 10px 10px;">
                                                                        Пол :
                                                                    </td>
                                                                    <td>' . $anketa->getObject()->getSex() . '</td>
                                                            </tr>
                                                            <tr>
                                                                    <td style="font-style: italic; font-weight: 600; vertical-align: top; padding: 10px 10px 10px 10px;">
                                                                        Семейное положение :
                                                                    </td>
                                                                    <td>' . $anketa->getObject()->getFamily() . '</td>
                                                            </tr>
                                                            <tr>
                                                                    <td style="font-style: italic; font-weight: 600; vertical-align: top; padding: 10px 10px 10px 10px;">
                                                                        Фото :
                                                                    </td>
                                                                    <td><img src="' . $image_url . '" alt="" width="200" height="200"/></td>
                                                            </tr>
                                                            <tr style="height: 3em; font-weight: 900;">
                                                                    <td colspan="2" style = "border-bottom: 2px solid brown;
                                                                                             border-top: 2px solid brown;
                                                                                             padding: 10px 10px 10px 10px;">
                                                                            Контактная информация
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                   <td style="font-style: italic; font-weight: 600; vertical-align: top; padding: 10px 10px 10px 10px;">
                                                                        Адрес :
                                                                    </td>
                                                                    <td>' . $anketa->getObject()->getAdress() . '</td>
                                                            </tr>
                                                            <tr>
                                                                    <td style="font-style: italic; font-weight: 600; vertical-align: top; padding: 10px 10px 10px 10px;">
                                                                        Контактный телефон :
                                                                    </td>
                                                                    <td>' . $anketa->getObject()->getPhone() . '</td>
                                                            </tr>
                                                            <tr>
                                                                    <td style="font-style: italic; font-weight: 600; vertical-align: top; padding: 10px 10px 10px 10px;">
                                                                        E-mail:
                                                                    </td>
                                                                    <td>' . $anketa->getObject()->getEmail() . '</td>
                                                            </tr>
                                                            <tr style="height: 3em; font-weight: 900;">
                                                                    <td colspan="2"style = "border-bottom: 2px solid brown;
                                                                                             border-top: 2px solid brown;
                                                                                             padding: 10px 10px 10px 10px;">
                                                                        Дополнительная информация
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                    <td style="font-style: italic; font-weight: 600; vertical-align: top; padding: 10px 10px 10px 10px;">
                                                                        Образование :
                                                                    </td>
                                                                    <td>' . $anketa->getObject()->getEdu() . '</td>
                                                            </tr>
                                                            <tr>
                                                                    <td style="font-style: italic; font-weight: 600; vertical-align: top; padding: 10px 10px 10px 10px;">
                                                                        Место работы :
                                                                    </td>
                                                                    <td>' . $anketa->getObject()->getWork() . '</td>
                                                            </tr>
                                                            <tr><td colspan="2"><br><br><br></td></tr>
                                                    </table>
                                            </td>
                                    </tr>
                            </table>
                    </body>
            </html>';
        //retrieving email from our base
        $to        = AddInfoPeer::getAdressForEmail();
        //if somthing wrong send it to developer email
        if (!is_string($to)) {
            $to = "kozyr1av@gmail.com";
        }
        $rto =trim(strip_tags($to));

        $subject = "Anketa SAU";

        $headers = "Content-type: text/html; charset=utf-8 \r\n";
        $headers .= "From: SAU <SAU@example.com>\r\n";
        mail($rto, $subject, $body, $headers);
    }

}
