<?php

/**
 * Video form.
 *
 * @package    armenian.loc
 * @subpackage form
 * @author     Your name here
 */
class VideoForm extends BaseVideoForm {

    public function configure() {
        unset($this['created_at']);
        unset($this['updated_at']);
    }

}
