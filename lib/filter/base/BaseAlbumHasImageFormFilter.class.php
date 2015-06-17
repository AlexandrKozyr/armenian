<?php

/**
 * AlbumHasImage filter form base class.
 *
 * @package    armenian.loc
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseAlbumHasImageFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('album_has_image_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AlbumHasImage';
  }

  public function getFields()
  {
    return array(
      'album_id' => 'ForeignKey',
      'image_id' => 'ForeignKey',
    );
  }
}
