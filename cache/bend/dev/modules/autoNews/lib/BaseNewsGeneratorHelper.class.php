<?php

/**
 * news module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage news
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseNewsGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'news' : 'news_'.$action;
  }
}
