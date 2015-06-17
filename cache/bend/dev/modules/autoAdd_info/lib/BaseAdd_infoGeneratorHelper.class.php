<?php

/**
 * add_info module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage add_info
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseAdd_infoGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'add_info' : 'add_info_'.$action;
  }
}
