<?php

/**
 * AddInfo form base class.
 *
 * @method AddInfo getObject() Returns the current form's model object
 *
 * @package    armenian.loc
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseAddInfoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'title'            => new sfWidgetFormInputText(),
      'content'          => new sfWidgetFormTextarea(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'meta_description' => new sfWidgetFormTextarea(),
      'meta_keywords'    => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'title'            => new sfValidatorString(array('max_length' => 255)),
      'content'          => new sfValidatorString(),
      'created_at'       => new sfValidatorDateTime(array('required' => false)),
      'updated_at'       => new sfValidatorDateTime(array('required' => false)),
      'meta_description' => new sfValidatorString(array('required' => false)),
      'meta_keywords'    => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'AddInfo', 'column' => array('id'))),
        new sfValidatorPropelUnique(array('model' => 'AddInfo', 'column' => array('title'))),
      ))
    );

    $this->widgetSchema->setNameFormat('add_info[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AddInfo';
  }


}
