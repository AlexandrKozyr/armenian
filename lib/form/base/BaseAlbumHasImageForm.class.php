<?php

/**
 * AlbumHasImage form base class.
 *
 * @method AlbumHasImage getObject() Returns the current form's model object
 *
 * @package    armenian.loc
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseAlbumHasImageForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'album_id' => new sfWidgetFormInputHidden(),
      'image_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'album_id' => new sfValidatorPropelChoice(array('model' => 'Album', 'column' => 'id', 'required' => false)),
      'image_id' => new sfValidatorPropelChoice(array('model' => 'Image', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('album_has_image[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AlbumHasImage';
  }


}
