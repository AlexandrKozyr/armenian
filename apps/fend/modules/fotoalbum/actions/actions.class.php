<?php

/**
 * fotoalbum actions.
 *
 * @package    armenian.loc
 * @subpackage fotoalbum
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class fotoalbumActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $criteria = new Criteria;
        $criteria->addDescendingOrderByColumn(AlbumPeer::CREATED_AT);
        //miss our default albums for @main page and @about us page
        $criteria->add(AlbumPeer::ID, 2, Criteria::GREATER_THAN);

        $pager       = new sfPropelPager('Album', 6);
        $pager->setCriteria($criteria);
        $pager->setPage($this->getRequestParameter('page', 1));
        $pager->init();
        $this->pager = $pager;
    }

    public function executeShow($request) {
        $albumId = $request->getParameter('id');
        $this->currentAlbum = AlbumPeer::retrieveByPK($albumId);
        //add metas(custom method)
        $this->setMetasForCurrentObject($this->currentAlbum);

        if ($this->currentAlbum == true) {
            $stm             = Propel::getConnection()->prepare('
            SELECT 
                img.`hash`, img.`title`
              FROM
                album_has_image AS alb
                INNER JOIN image AS img
                  ON img.id = alb.image_id 
              WHERE alb.album_id = :id 
        ');
            $stm->bindParam(':id', $albumId);
            $stm->execute();
            $this->listOfImg = $stm->fetchAll(PDO::FETCH_NUM);
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
