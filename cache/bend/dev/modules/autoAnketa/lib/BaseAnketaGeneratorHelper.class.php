<?php

/**
 * anketa module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage anketa
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseAnketaGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'anketa' : 'anketa_'.$action;
  }
}
