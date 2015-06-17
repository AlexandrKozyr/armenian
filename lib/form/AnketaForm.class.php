<?php

/**
 * Anketa form.
 *
 * @package    armenian.loc
 * @subpackage form
 * @author     Your name here
 */
class AnketaForm extends BaseAnketaForm {

    public function configure() {
        unset($this['created_at']);
        unset($this['updated_at']);
        unset($this['image_id']);
        $this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array(
            'edit_mode' => false == $this->isNew,
            'is_image' => true,
            'delete_label'=>'Удалить изображние',
            'file_src' => $this->getImagePath(),
            'with_delete' => $this->getWithDelete(),
        ));
        $this->validatorSchema['image'] = new myValidatorImage(array('required' => true));
        $this->validatorSchema['image_delete'] = new sfValidatorPass(array('required' => false));
    }

    protected function getWithDelete() {
        if (false == $this->isNew) {

            if ($this->getObject()->getImageId()) {
                return true;
            }
        }
        return false;
    }

    protected function getImagePath() {
        if (false == $this->isNew || is_null($this->getObject()->getImageId()) == true) {

            if ($this->getObject()->getImageId()) {
                return '/uploads/300/200/' . $this->getObject()->getImage()->getHash();
            }
        }
        return '';
    }

    public function updateDefaultsFromObject() {
        parent::updateDefaultsFromObject();
    }

    public function processValues($values) {

        if ($values['image_delete']) {
            $values['image_id'] = null;
        } elseif ($values['image']['size'] > 0) {
            $values['image_id'] = $this->doSaveImage($values['image']);
        } elseif (false == $this->isNew && $values['image']['error'] == 4) {
            $values['image_id'] = $this->getObject()->getImageId();
        }
        return $values;
    }

}
