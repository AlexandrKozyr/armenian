<?php

/**
 * Project form base class.
 *
 * @package    armenian.loc
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseFormPropel extends sfFormPropel {

    public function setup() {
        
    }

    protected function doSaveImage($v) {

        $content = file_get_contents($v['tmp_name']);

        list($image, $ext) = explode('/', $v['type']);

        $hash = md5($content) . '.' . $ext;

        $criteria_for_image = new Criteria;
        $criteria_for_image->add(ImagePeer::HASH, $hash);
        $image_obj = ImagePeer::doSelectOne($criteria_for_image);
        
        try {
            if (empty($image_obj)) {
                $image_obj = new Image();
                $image_obj->setHash($hash)
                        ->setContent(base64_encode($content))
                        ->save();
            }
        } catch (Exception $e) {
            
        }
        return $image_obj->getId();
    }

}
