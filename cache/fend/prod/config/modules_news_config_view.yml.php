<?php
// auto-generated by sfViewConfigHandler
// date: 2015/06/17 13:57:03
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'Союз армян Украины - Кировоград', false, false);
  $response->addMeta('description', 'Официальный сайт Союза армян Украины в г. Кировоград', false, false);
  $response->addMeta('keywords', 'Союз, армяне, Кировоград, община, землячество, сау, союз армян украины, армяне украины, спілка вірмен україни, вірмени україни', false, false);

  $response->addStylesheet('all.css', '', array ());
  $response->addJavascript('jquery-1.9.0.min.js', '', array ());
  $response->addJavascript('inputs.js', '', array ());
  $response->addJavascript('jquery.bpopup.min.js', '', array ());
  $response->addJavascript('jquery.main.js', '', array ());


