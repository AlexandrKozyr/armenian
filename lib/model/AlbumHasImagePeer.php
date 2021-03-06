<?php

/**
 * Skeleton subclass for performing query and update operations on the 'album_has_image' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 05/13/15 15:28:20
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class AlbumHasImagePeer extends BaseAlbumHasImagePeer {

    /**
     * delete set of images for album with $id for further new write
     * @param int $id
     * @return type
     */
    static function cleanUp($id) {
        $c = new criteria();
        $c->add(self::ALBUM_ID, $id);
        return self::doDelete($c);
    }
    
    /**
     * get an array of images id using by all albums
     * @return array list of image_id of all Albums
     */
    static function getAllAlbumImageId() {
        $stm = Propel::getConnection()->prepare
                ('
                    SELECT
                        alhi.image_id
                    FROM
                        album_has_image alhi
                ');
        $stm->execute();
        $albumImageId = $stm->fetchAll(PDO::FETCH_COLUMN, 0);
        return $albumImageId;
    }
    
    
}

// AlbumHasImagePeer

    