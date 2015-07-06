<?php

/**
 * album module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage album
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseAlbumGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'album' : 'album_'.$action;
  }
}
