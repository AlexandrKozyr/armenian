<?php

/**
 * video actions.
 *
 * @package    armenian.loc
 * @subpackage video
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class videoActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {

        $criteria    = new Criteria;
        $criteria->addDescendingOrderByColumn(VideoPeer::CREATED_AT);
        $pager       = new sfPropelPager('Video', 8);
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
        //geting main video

        $currentVideoID     = $request->getParameter('id');
        $this->currentVideo = VideoPeer::retrieveByPK($currentVideoID);
        
        //add metas(custom method)
        $this->setMetasForCurrentObject($this->currentVideo);

        if (is_object($this->currentVideo)) {
            //obtaining an array of sorted userids
            $listOfVideoIdSorted = VideoPeer::getVideosIdSortedByCreatedAt();
            //below we getting prev and next video for our view
            $prevVideoID         = null;
            $nextVideoID         = null;
            //we looking for closeset next and prev video id

            for ($i = 0; $i < count($listOfVideoIdSorted); $i++) {
                if ($currentVideoID == $listOfVideoIdSorted[$i]) {
                    $pI = $i - 1;
                    $nI = $i + 1;
                    if ($pI >= 0) {
                        $prevVideoID = $listOfVideoIdSorted[$pI];
                    }
                    if ($nI < count($listOfVideoIdSorted)) {
                        $nextVideoID = $listOfVideoIdSorted[$nI];
                    }
                }
            }

            // below we check our result if videoid exist we get news with it
            // and if it is last or first video we take first or last video
            // to make cicle at our show page
            if (!is_null($prevVideoID)) {
                $this->prevVideo = VideoPeer::retrieveByPK($prevVideoID);
            } else {
                $lastVideoId     = count($listOfVideoIdSorted) - 1;
                $this->prevVideo = VideoPeer::retrieveByPK($listOfVideoIdSorted[$lastVideoId]);
            }
            if (!is_null($nextVideoID)) {
                $this->nextVideo = VideoPeer::retrieveByPK($nextVideoID);
            } else {
                $this->nextVideo = VideoPeer::retrieveByPK($listOfVideoIdSorted[0]);
            }
        } else {
            $this->forward404();
        }
    }

    /**
     * this method acsepts an object and sets dinamic metas for it view
     * @param object $obj - current object where we need to change meta
     */
    protected function setMetasForCurrentObject($obj) {
        $defaultTitle       = 'САУ Кировоград - ';
        $defaultDescription = 'Новости Союза армян Украины в Кировоградской области - ';
        $defaultKeyWords    = 'Союз, армяне, Кировоград, община,
                 землячество, сау, союз армян украины, армяне украины, 
                 спілка вірмен україни, вірмени україни, членсво,
                 членство, вступить, dcnegbnm, fhvzyt, erhfbyf, 
                 новости, информация, узнать, ';

        $newsTitle       = $obj->getTitle();
        $newsDescription = $obj->getMetaDescription();
        $newsKeyWords    = $obj->getMetaKeywords();

        $this->getResponse()->addMeta('title', $defaultTitle . $newsTitle);
        $this->getResponse()->addMeta('description', $defaultDescription . $newsDescription);
        $this->getResponse()->addMeta('keywords', $defaultKeyWords . $newsKeyWords);
    }

}
