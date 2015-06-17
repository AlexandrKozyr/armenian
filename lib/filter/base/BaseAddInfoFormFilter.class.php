<?php

/**
 * AddInfo filter form base class.
 *
 * @package    armenian.loc
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseAddInfoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'content'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'meta_description' => new sfWidgetFormFilterInput(),
      'meta_keywords'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'title'            => new sfValidatorPass(array('required' => false)),
      'content'          => new sfValidatorPass(array('required' => false)),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'meta_description' => new sfValidatorPass(array('required' => false)),
      'meta_keywords'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('add_info_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AddInfo';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'title'            => 'Text',
      'content'          => 'Text',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
      'meta_description' => 'Text',
      'meta_keywords'    => 'Text',
    );
  }
}
