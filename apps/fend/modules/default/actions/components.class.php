<?php

class defaultComponents extends sfComponents {

    public function executeMenu() {
        $this->rout =  sfContext::getInstance()->getRouting()->getCurrentRouteName();
    }
}
