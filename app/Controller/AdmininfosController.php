<?php

App::uses('PassesController', 'Controller');

class AdmininfosController extends PassesController {

  public $uses = array('Info');

  public $helpers = array('Html', 'Form', 'Flash');
  // public $components = array('Flash');

  public function index() {
    $this->set('infos', $this->Info->find('all'));
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
    if($this->request->is('post') && $this->request->data['Search']['title'] != ""){
      //Formの値を取得
      $title = $this->request->data['Info']['title'];
      //検索文字を空白（全角又は半角）で区切って配列$keywordsに代入
      $keywords = preg_split("/ |\\s/",$title);
      //配列$keywordsの数だけ繰り返して検索条件を$conditionsに代入
      foreach($keywords as $keyword){
        $conditions[] = "title like '%$keyword%'";
      }
      //POSTされたデータを曖昧検索
      $data = $this->Info->find('all',array(
        'conditions' => $conditions
      ));
      $this->set('datas',$data);
    }else{
      //POST以外の場合
      //一覧表示
      $data = $this->Info->find('all');
      $this->set('datas',$data);
    }
  }
}
