<?php

/**
 * User filter form base class.
 *
 * @package    armenian.loc
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseUserFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'login'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'create_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'login'      => new sfValidatorPass(array('required' => false)),
      'password'   => new sfValidatorPass(array('required' => false)),
      'create_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'login'      => 'Text',
      'password'   => 'Text',
      'create_at'  => 'Date',
      'updated_at' => 'Date',
    );
  }
}
