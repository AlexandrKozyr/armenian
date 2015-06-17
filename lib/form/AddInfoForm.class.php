<?php

/**
 * AddInfo form.
 *
 * @package    armenian.loc
 * @subpackage form
 * @author     Your name here
 */
class AddInfoForm extends BaseAddInfoForm {

    public function configure() {
        unset($this['created_at']);
        unset($this['updated_at']);
        $this->widgetSchema['content'] = new clWidgetFormCKEditor();
    }

}
