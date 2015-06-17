<?php

/**
 * default actions.
 *
 * @package    armenian.loc
 * @subpackage default
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class defaultActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        //using sfPropelPager for pagination
        $criteria = new Criteria;
        $criteria->addDescendingOrderByColumn(NewsPeer::CREATED_AT);

        $pager       = new sfPropelPager('News', 5);
        $pager->setCriteria($criteria);
        $pager->setPage($this->getRequestParameter('page', 1));
        $pager->init();
        $this->pager = $pager;
        
        //geting images for slider
        $this->listOfImages = AlbumPeer::getMainPageImages();
    }

    public function executeAbout(sfWebRequest $request) {

        $this->aboutUs = AddInfoPeer::retrieveByPK('1');
    }

}
