<?php

class PasssController extends AppController {

   public $components = array(
       'Flash',
       'Auth' => array(
           'loginRedirect' => array(
               'controller' => 'admininfos',
               'action' => 'index'
           ),
           'logoutRedirect' => array(
               'controller' => 'pages',
               'action' => 'display',
               'home'
           ),
           'authenticate' => array(
               'Form' => array(
                   'passwordHasher' => 'Blowfish'
               )
           )
       )
   );

   // public function beforeFilter() {
   //     $this->Auth->allow('index', 'view');
   // }
}
