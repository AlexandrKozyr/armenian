<?php

/**
 * News form base class.
 *
 * @method News getObject() Returns the current form's model object
 *
 * @package    armenian.loc
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseNewsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'image_id'         => new sfWidgetFormPropelChoice(array('model' => 'Image', 'add_empty' => true)),
      'title'            => new sfWidgetFormInputText(),
      'content'          => new sfWidgetFormTextarea(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'meta_description' => new sfWidgetFormTextarea(),
      'meta_keywords'    => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'image_id'         => new sfValidatorPropelChoice(array('model' => 'Image', 'column' => 'id', 'required' => false)),
      'title'            => new sfValidatorString(array('max_length' => 255)),
      'content'          => new sfValidatorString(),
      'created_at'       => new sfValidatorDateTime(array('required' => false)),
      'updated_at'       => new sfValidatorDateTime(array('required' => false)),
      'meta_description' => new sfValidatorString(array('required' => false)),
      'meta_keywords'    => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'News', 'column' => array('id'))),
        new sfValidatorPropelUnique(array('model' => 'News', 'column' => array('title'))),
      ))
    );

    $this->widgetSchema->setNameFormat('news[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'News';
  }


}
