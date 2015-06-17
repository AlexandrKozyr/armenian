<?php

/**
 * default actions.
 *
 * @package    armenian.loc
 * @subpackage default
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class defaultActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        sfConfig::set('sf_web_debug', false);
    }


    public function executeLogin(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
            $this->redirect('default/index');
        }
        
        if ($request->isMethod('post')) {
            $login = $request->getParameter('nog');
            $password = $request->getParameter('dro');
            $password = sha1($password.'1986');

            $c = new Criteria;
            $c->add(UserPeer::LOGIN, $login);
            $c->add(UserPeer::PASSWORD, $password);
            $user = UserPeer::doSelectOne($c);

            if (false == empty($user)) {
                $this->getUser()->setAuthenticated(true);
                $this->getUser()->addCredentials(array('admin'));
                $this->getUser()->setAttribute('user', $user);
                $this->redirect('default/index');
            }
        }
    }

    public function executeLogout() {
        $this->getUser()->setAuthenticated(false);
        $this->redirect('default/index');
    }


}
