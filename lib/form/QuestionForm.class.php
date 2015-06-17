<?php

/**
 * Question form.
 *
 * @package    armenian.loc
 * @subpackage form
 * @author     Your name here
 */
class QuestionForm extends BaseQuestionForm {

    public function configure() {
        unset($this['created_at']);
        unset($this['updated_at']);
    }

}
