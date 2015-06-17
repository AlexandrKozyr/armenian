<?php

/**
 * Question filter form base class.
 *
 * @package    armenian.loc
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseQuestionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'FIO'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'message'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'FIO'        => new sfValidatorPass(array('required' => false)),
      'email'      => new sfValidatorPass(array('required' => false)),
      'phone'      => new sfValidatorPass(array('required' => false)),
      'message'    => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('question_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Question';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'FIO'        => 'Text',
      'email'      => 'Text',
      'phone'      => 'Text',
      'message'    => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
