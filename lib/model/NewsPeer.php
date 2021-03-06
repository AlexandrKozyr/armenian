<?php

/**
 * Skeleton subclass for performing query and update operations on the 'news' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 05/07/15 12:45:25
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class NewsPeer extends BaseNewsPeer {
    
    /**
     * get an array of images id using by news
     * @return array list of image_id of all news
     */
    static function getAllNewsImageId(){
        $stm   = Propel::getConnection()->prepare
                    ('
                    SELECT
                        n.image_id
                    FROM
                        news n 
                ');
            $stm->execute();
            $newsImageId = $stm->fetchAll(PDO::FETCH_COLUMN, 0);
            return $newsImageId;
    }
    
    /**
     * using for looking previos and next news at show news page
     * @return array list of newsid sorted by createdAt field
     */
    static function getNewsIdSortedByCreatedAt(){
        $stm   = Propel::getConnection()->prepare
                    ('
                    SELECT 
                        n.id
                      FROM
                        news n 
                      ORDER BY n.created_at DESC
                ');
            $stm->execute();
            $newsIdSortedByCreatedAt = $stm->fetchAll(PDO::FETCH_COLUMN, 0);
            return $newsIdSortedByCreatedAt;
    }
    
  
}

// NewsPeer
