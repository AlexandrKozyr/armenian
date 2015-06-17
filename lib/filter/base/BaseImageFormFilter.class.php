<?php

/**
 * Image filter form base class.
 *
 * @package    armenian.loc
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseImageFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'hash'                 => new sfWidgetFormFilterInput(),
      'title'                => new sfWidgetFormFilterInput(),
      'content'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'album_has_image_list' => new sfWidgetFormPropelChoice(array('model' => 'Album', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'hash'                 => new sfValidatorPass(array('required' => false)),
      'title'                => new sfValidatorPass(array('required' => false)),
      'content'              => new sfValidatorPass(array('required' => false)),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'album_has_image_list' => new sfValidatorPropelChoice(array('model' => 'Album', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('image_filters[%s]');

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

    $criteria->addJoin(AlbumHasImagePeer::IMAGE_ID, ImagePeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(AlbumHasImagePeer::ALBUM_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(AlbumHasImagePeer::ALBUM_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Image';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'hash'                 => 'Text',
      'title'                => 'Text',
      'content'              => 'Text',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
      'album_has_image_list' => 'ManyKey',
    );
  }
}
