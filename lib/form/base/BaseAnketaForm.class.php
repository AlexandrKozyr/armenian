<?php

/**
 * Anketa form base class.
 *
 * @method Anketa getObject() Returns the current form's model object
 *
 * @package    armenian.loc
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseAnketaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'FIO'        => new sfWidgetFormInputText(),
      'email'      => new sfWidgetFormInputText(),
      'phone'      => new sfWidgetFormInputText(),
      'message'    => new sfWidgetFormTextarea(),
      'birthday'   => new sfWidgetFormDate(),
      'sex'        => new sfWidgetFormInputText(),
      'family'     => new sfWidgetFormInputText(),
      'image_id'   => new sfWidgetFormPropelChoice(array('model' => 'Image', 'add_empty' => true)),
      'adress'     => new sfWidgetFormTextarea(),
      'edu'        => new sfWidgetFormInputText(),
      'work'       => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'FIO'        => new sfValidatorString(array('max_length' => 45)),
      'email'      => new sfValidatorString(array('max_length' => 45)),
      'phone'      => new sfValidatorString(array('max_length' => 45)),
      'message'    => new sfValidatorString(),
      'birthday'   => new sfValidatorDate(),
      'sex'        => new sfValidatorString(array('max_length' => 45)),
      'family'     => new sfValidatorString(array('max_length' => 45)),
      'image_id'   => new sfValidatorPropelChoice(array('model' => 'Image', 'column' => 'id', 'required' => false)),
      'adress'     => new sfValidatorString(),
      'edu'        => new sfValidatorString(array('max_length' => 45)),
      'work'       => new sfValidatorString(),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Anketa', 'column' => array('id'))),
        new sfValidatorPropelUnique(array('model' => 'Anketa', 'column' => array('FIO'))),
        new sfValidatorPropelUnique(array('model' => 'Anketa', 'column' => array('email'))),
      ))
    );

    $this->widgetSchema->setNameFormat('anketa[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Anketa';
  }


}
