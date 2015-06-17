<?php

/**
 * Question form base class.
 *
 * @method Question getObject() Returns the current form's model object
 *
 * @package    armenian.loc
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseQuestionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'FIO'        => new sfWidgetFormInputText(),
      'email'      => new sfWidgetFormInputText(),
      'phone'      => new sfWidgetFormInputText(),
      'message'    => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'FIO'        => new sfValidatorString(array('max_length' => 255)),
      'email'      => new sfValidatorString(array('max_length' => 255)),
      'phone'      => new sfValidatorString(array('max_length' => 255)),
      'message'    => new sfValidatorString(),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Question', 'column' => array('id'))),
        new sfValidatorPropelUnique(array('model' => 'Question', 'column' => array('FIO'))),
        new sfValidatorPropelUnique(array('model' => 'Question', 'column' => array('email'))),
      ))
    );

    $this->widgetSchema->setNameFormat('question[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Question';
  }


}
