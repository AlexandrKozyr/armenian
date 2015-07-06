<?php

/**
 * Anketa filter form base class.
 *
 * @package    armenian.loc
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseAnketaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'FIO'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'message'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'birthday'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sex'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'family'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image_id'   => new sfWidgetFormPropelChoice(array('model' => 'Image', 'add_empty' => true)),
      'adress'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'edu'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'work'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'FIO'        => new sfValidatorPass(array('required' => false)),
      'email'      => new sfValidatorPass(array('required' => false)),
      'phone'      => new sfValidatorPass(array('required' => false)),
      'message'    => new sfValidatorPass(array('required' => false)),
      'birthday'   => new sfValidatorPass(array('required' => false)),
      'sex'        => new sfValidatorPass(array('required' => false)),
      'family'     => new sfValidatorPass(array('required' => false)),
      'image_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Image', 'column' => 'id')),
      'adress'     => new sfValidatorPass(array('required' => false)),
      'edu'        => new sfValidatorPass(array('required' => false)),
      'work'       => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('anketa_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Anketa';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'FIO'        => 'Text',
      'email'      => 'Text',
      'phone'      => 'Text',
      'message'    => 'Text',
      'birthday'   => 'Text',
      'sex'        => 'Text',
      'family'     => 'Text',
      'image_id'   => 'ForeignKey',
      'adress'     => 'Text',
      'edu'        => 'Text',
      'work'       => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
