<?php

App::uses('PassesController', 'Controller');

class AdmininfosController extends PassesController {

  public $uses = array('Info');

  public $helpers = array('Html', 'Form', 'Flash');
  // public $components = array('Flash');

  public $paginate = array(
    'limit' =>10
  );

  public function index() {
    $this->set('infos', $this->paginate());
  }

  public function view($id) {
    if (!$id) {
      throw new NotFoundException(__('Invalid post'));
    }

    $info = $this->Info->findById($id);
    if (!$info) {
      throw new NotFoundException(__('Invalid post'));
    }
    $this->set('info', $info);
  }

  public function add() {
    if ($this->request->is('post')) {
      $this->Info->create();
      if ($this->Info->save($this->request->data)) {
        $this->Flash->success(__('Your post has been saved.'));
        return $this->redirect(array('action' => 'index'));
      }
      $this->Flash->error(__('Unable to add your post.'));
    }
  }
  public function edit($id = null) {
    if (!$id) {
      throw new NotFoundException(__('Invalid post'));
    }

    $info = $this->Info->findById($id);
    if (!$info) {
      throw new NotFoundException(__('Invalid post'));
    }

    if ($this->request->is(array('post', 'put'))) {
      $this->Info->id = $id;
      if ($this->Info->save($this->request->data)) {
        $this->Flash->success(__('Your post has been updated.'));
        return $this->redirect(array('action' => 'index'));
      }
      $this->Flash->error(__('Unable to update your post.'));
    }

    if (!$this->request->data) {
      $this->request->data = $info;
    }
  }
  public function delete($id) {
    if ($this->request->is('get')) {
      throw new MethodNotAllowedException();
    }

    if ($this->Info->delete($id)) {
      $this->Flash->success(
        __('The post with id: %s has been deleted.', h($id))
      );
    } else {
      $this->Flash->error(
        __('The post with id: %s could not be deleted.', h($id))
      );
    }

    return $this->redirect(array('action' => 'index'));
  }


  public function search(){
    if($this->request->is('post')){
      $title=$this->request->data['Info']['title'];
      $keywords =array(
        'conditions'=>array(
          'or'=>array(
            'body like'=>'%'.$title.'%',
            'title like'=>'%'.$title.'%')
          )
        );

        $data = $this->Info->find('all',$keywords);
        $this->set('datas',$data);
      }else{
        $this->set('datas', $this->Info->find('all'));
      }
    }
  }
