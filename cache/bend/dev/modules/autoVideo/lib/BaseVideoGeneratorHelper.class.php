<?php

/**
 * video module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage video
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseVideoGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'video' : 'video_'.$action;
  }
}
