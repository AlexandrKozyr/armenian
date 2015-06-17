<?php

/**
 * news actions.
 *
 * @package    armenian.loc
 * @subpackage news
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        //using sfPropelPager for pagination
        $criteria    = new Criteria;
        $criteria->addDescendingOrderByColumn(NewsPeer::CREATED_AT);
        $pager       = new sfPropelPager('News', 8);
        $pager->setCriteria($criteria);
        $pager->setPage($this->getRequestParameter('page', 1));
        $pager->init();
        $this->pager = $pager;
    }
    /**
     * Executes show action
     * @param sfWebRequest $request
     */
    public function executeShow(sfWebRequest $request) {
        //geting main news
        $currentNewsID = $request->getParameter('id');

        $this->currentNews = NewsPeer::retrieveByPK($currentNewsID);
        //obtaining an array of sorted userids
        $listOfNewsIdSorted = NewsPeer::getNewsIdSortedByCreatedAt();
        //below we getting prev and next news for our view
        $prevNewsID = null;
        $nextNewsID = null;
        //we looking for closeset next and prev news id
        
        for ($i = 0; $i < count($listOfNewsIdSorted); $i++) {
            if ($currentNewsID == $listOfNewsIdSorted[$i]) {
                $pI=$i-1;
                $nI=$i+1;
                if ($pI >= 0) {
                    $prevNewsID = $listOfNewsIdSorted[$pI];
                }
                if ($nI < count($listOfNewsIdSorted)) {
                    $nextNewsID = $listOfNewsIdSorted[$nI];
                }
            }
        }
            
        //below we check our result if newsid exist we get news with it
        // and if it is last or first news we take first or last news to make cicle at our show page
        if (!is_null($prevNewsID)) {
            $this->prevNews = NewsPeer::retrieveByPK($prevNewsID);
        } else {
            $lastNewsId = count($listOfNewsIdSorted)-1;
            $this->prevNews = NewsPeer::retrieveByPK($listOfNewsIdSorted[$lastNewsId]);
        }
        if (!is_null($nextNewsID)) {
            $this->nextNews = NewsPeer::retrieveByPK($nextNewsID);
        } else {
            $this->nextNews = NewsPeer::retrieveByPK($listOfNewsIdSorted[0]);
        }
    }

}
