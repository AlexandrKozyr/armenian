<?php

/**
 * news module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage news
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseNewsGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array(  '_list' => NULL,  '_save' => NULL,);
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  '_edit' =>   array(    'label' => 'Просмотреть',  ),  '_delete' =>   array(    'label' => 'Удалить',  ),);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array();
  }

  public function getListParams()
  {
    return '%%title%% - %%created_at%% - %%updated_at%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Список Новостей';
  }

  public function getEditTitle()
  {
    return 'Редактирование новости "%%Title%%"';
  }

  public function getNewTitle()
  {
    return 'Создание новости';
  }

  public function getFilterDisplay()
  {
    return array();
  }

  public function getFormDisplay()
  {
    return array();
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => 'title',  1 => 'created_at',  2 => 'updated_at',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => '№',),
      'image_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'title' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Заголовок',),
      'content' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Содержание',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',  'label' => 'Дата создания',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',  'label' => 'Дата редактирования',),
      'meta_description' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Мета описание',),
      'meta_keywords' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Ключевые слова',),
      'image' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Обложка',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'image_id' => array(),
      'title' => array(),
      'content' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'meta_description' => array(),
      'meta_keywords' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'image_id' => array(),
      'title' => array(),
      'content' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'meta_description' => array(),
      'meta_keywords' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'image_id' => array(),
      'title' => array(),
      'content' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'meta_description' => array(),
      'meta_keywords' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'image_id' => array(),
      'title' => array(),
      'content' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'meta_description' => array(),
      'meta_keywords' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'image_id' => array(),
      'title' => array(),
      'content' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'meta_description' => array(),
      'meta_keywords' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'NewsForm';
  }

  public function hasFilterForm()
  {
    return false;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'NewsFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfPropelPager';
  }

  public function getPagerMaxPerPage()
  {
    return 10;
  }

  public function getDefaultSort()
  {
    return array(null, null);
  }

  public function getPeerMethod()
  {
    return 'doSelect';
  }

  public function getPeerCountMethod()
  {
    return 'doCount';
  }
}
