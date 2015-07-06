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
        $criteria->add(AlbumPeer::ID, 1, Criteria::NOT_EQUAL);

        $pager       = new sfPropelPager('Album', 6);
        $pager->setCriteria($criteria);
        $pager->setPage($this->getRequestParameter('page', 1));
        $pager->init();
        $this->pager = $pager;
    }

    public function executeShow($request) {
        $albumId = $request->getParameter('id');

        $this->curAlbum = AlbumPeer::retrieveByPK($albumId);

        if ($this->curAlbum == true) {
            $stm              = Propel::getConnection()->prepare('
            SELECT 
                img.`hash`, img.`title`
              FROM
                album_has_image AS alb
                INNER JOIN image AS img
                  ON img.id = alb.image_id 
              WHERE alb.album_id = :id 
        ');
            $stm->bindParam(':id',  $albumId);
            $stm->execute();
            $this->listOfImg = $stm->fetchAll(PDO::FETCH_NUM);
        } else {
            $this->forward404();
        }
    }

}
