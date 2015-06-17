<?php

require_once(dirname(__FILE__).'/../lib/BaseAlbumGeneratorConfiguration.class.php');
require_once(dirname(__FILE__).'/../lib/BaseAlbumGeneratorHelper.class.php');

/**
 * album actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage album
 * @author     ##AUTHOR_NAME##
 */
abstract class autoAlbumActions extends sfActions
{
  public function preExecute()
  {
    $this->configuration = new albumGeneratorConfiguration();

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($this->getActionName())))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $this->dispatcher->notify(new sfEvent($this, 'admin.pre_execute', array('configuration' => $this->configuration)));

    $this->helper = new albumGeneratorHelper();

    parent::preExecute();
  }

  public function executeIndex(sfWebRequest $request)
  {
    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }


  public function executeNew(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->Album = $this->form->getObject();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->Album = $this->form->getObject();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->Album = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->Album);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->Album = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->Album);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    $this->getRoute()->getObject()->delete();

    $this->getUser()->setFlash('notice', 'The item was deleted successfully.');

    $this->redirect('@album');
  }


  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $Album = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $Album)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@album_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'album_edit', 'sf_subject' => $Album));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }


  protected function getPager()
  {
    $pager = $this->configuration->getPager('Album');
    $pager->setCriteria($this->buildCriteria());
    $pager->setPage($this->getPage());
    $pager->setPeerMethod($this->configuration->getPeerMethod());
    $pager->setPeerCountMethod($this->configuration->getPeerCountMethod());
    $pager->init();

    return $pager;
  }

  protected function setPage($page)
  {
    $this->getUser()->setAttribute('album.page', $page, 'admin_module');
  }

  protected function getPage()
  {
    return $this->getUser()->getAttribute('album.page', 1, 'admin_module');
  }

  protected function buildCriteria()
  {
    $criteria = new Criteria();

    $this->addSortCriteria($criteria);

    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_criteria'), $criteria);
    $criteria = $event->getReturnValue();

    return $criteria;
  }

  protected function addSortCriteria($criteria)
  {
    if (array(null, null) == ($sort = $this->getSort()))
    {
      return;
    }

    $column = AlbumPeer::translateFieldName($sort[0], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
    if ('asc' == $sort[1])
    {
      $criteria->addAscendingOrderByColumn($column);
    }
    else
    {
      $criteria->addDescendingOrderByColumn($column);
    }
  }

  protected function getSort()
  {
    if (null !== $sort = $this->getUser()->getAttribute('album.sort', null, 'admin_module'))
    {
      return $sort;
    }

    $this->setSort($this->configuration->getDefaultSort());

    return $this->getUser()->getAttribute('album.sort', null, 'admin_module');
  }

  protected function setSort(array $sort)
  {
    if (null !== $sort[0] && null === $sort[1])
    {
      $sort[1] = 'asc';
    }

    $this->getUser()->setAttribute('album.sort', $sort, 'admin_module');
  }

  protected function isValidSortColumn($column)
  {
    return in_array($column, BasePeer::getFieldnames('Album', BasePeer::TYPE_FIELDNAME));
  }
}
