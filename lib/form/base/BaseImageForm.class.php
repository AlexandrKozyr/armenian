<?php

/**
 * Image form base class.
 *
 * @method Image getObject() Returns the current form's model object
 *
 * @package    armenian.loc
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseImageForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'hash'                 => new sfWidgetFormInputText(),
      'title'                => new sfWidgetFormInputText(),
      'content'              => new sfWidgetFormTextarea(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
      'album_has_image_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Album')),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'hash'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'title'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'content'              => new sfValidatorString(),
      'created_at'           => new sfValidatorDateTime(array('required' => false)),
      'updated_at'           => new sfValidatorDateTime(array('required' => false)),
      'album_has_image_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Album', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Image', 'column' => array('id'))),
        new sfValidatorPropelUnique(array('model' => 'Image', 'column' => array('hash'))),
      ))
    );

    $this->widgetSchema->setNameFormat('image[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Image';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['album_has_image_list']))
    {
      $values = array();
      foreach ($this->object->getAlbumHasImages() as $obj)
      {
        $values[] = $obj->getAlbumId();
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
    $c->add(AlbumHasImagePeer::IMAGE_ID, $this->object->getPrimaryKey());
    AlbumHasImagePeer::doDelete($c, $con);

    $values = $this->getValue('album_has_image_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new AlbumHasImage();
        $obj->setImageId($this->object->getPrimaryKey());
        $obj->setAlbumId($value);
        $obj->save();
      }
    }
  }

}
