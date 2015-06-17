<?php

/**
 * Album form base class.
 *
 * @method Album getObject() Returns the current form's model object
 *
 * @package    armenian.loc
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseAlbumForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'title'                => new sfWidgetFormInputText(),
      'description'          => new sfWidgetFormTextarea(),
      'cover_image'          => new sfWidgetFormPropelChoice(array('model' => 'Image', 'add_empty' => true)),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
      'meta_description'     => new sfWidgetFormTextarea(),
      'meta_keywords'        => new sfWidgetFormTextarea(),
      'album_has_image_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Image')),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'title'                => new sfValidatorString(array('max_length' => 255)),
      'description'          => new sfValidatorString(),
      'cover_image'          => new sfValidatorPropelChoice(array('model' => 'Image', 'column' => 'id', 'required' => false)),
      'created_at'           => new sfValidatorDateTime(array('required' => false)),
      'updated_at'           => new sfValidatorDateTime(array('required' => false)),
      'meta_description'     => new sfValidatorString(array('required' => false)),
      'meta_keywords'        => new sfValidatorString(array('required' => false)),
      'album_has_image_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Image', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Album', 'column' => array('id'))),
        new sfValidatorPropelUnique(array('model' => 'Album', 'column' => array('title'))),
      ))
    );

    $this->widgetSchema->setNameFormat('album[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Album';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['album_has_image_list']))
    {
      $values = array();
      foreach ($this->object->getAlbumHasImages() as $obj)
      {
        $values[] = $obj->getImageId();
      }

      $this->setDefault('album_has_image_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveAlbumHasImageList($con);
  }

  public function saveAlbumHasImageList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['album_has_image_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(AlbumHasImagePeer::ALBUM_ID, $this->object->getPrimaryKey());
    AlbumHasImagePeer::doDelete($c, $con);

    $values = $this->getValue('album_has_image_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new AlbumHasImage();
        $obj->setAlbumId($this->object->getPrimaryKey());
        $obj->setImageId($value);
        $obj->save();
      }
    }
  }

}
