<?php

/**
 * Album filter form base class.
 *
 * @package    armenian.loc
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseAlbumFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cover_image'          => new sfWidgetFormPropelChoice(array('model' => 'Image', 'add_empty' => true)),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'meta_description'     => new sfWidgetFormFilterInput(),
      'meta_keywords'        => new sfWidgetFormFilterInput(),
      'album_has_image_list' => new sfWidgetFormPropelChoice(array('model' => 'Image', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'title'                => new sfValidatorPass(array('required' => false)),
      'description'          => new sfValidatorPass(array('required' => false)),
      'cover_image'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Image', 'column' => 'id')),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'meta_description'     => new sfValidatorPass(array('required' => false)),
      'meta_keywords'        => new sfValidatorPass(array('required' => false)),
      'album_has_image_list' => new sfValidatorPropelChoice(array('model' => 'Image', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('album_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addAlbumHasImageListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(AlbumHasImagePeer::ALBUM_ID, AlbumPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(AlbumHasImagePeer::IMAGE_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(AlbumHasImagePeer::IMAGE_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Album';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'title'                => 'Text',
      'description'          => 'Text',
      'cover_image'          => 'ForeignKey',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
      'meta_description'     => 'Text',
      'meta_keywords'        => 'Text',
      'album_has_image_list' => 'ManyKey',
    );
  }
}
