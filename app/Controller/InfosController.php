<?php

App::uses('AppController', 'Controller');

class InfosController extends AppController {
    public $helpers = array('Html', 'Form');
    public $paginate = array(
    'limit' =>10
    );
    public function index() {
      $this->set('infos', $this->paginate());
    }
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid info'));
        }

        $info = $this->Info->findById($id);
        if (!$info) {
            throw new NotFoundException(__('Invalid info'));
        }
        $this->set('info', $info);
    }


}
