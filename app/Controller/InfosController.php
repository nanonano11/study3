<?php
class InfosController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
         $this->set('infos', $this->Info->find('all'));
    }
    public function admin() {
         $this->set('infos', $this->Info->find('all'));
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
    public function add() {
    if ($this->request->is('info')) {
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

    $info = $this->info->findById($id);
    if (!$info) {
        throw new NotFoundException(__('Invalid post'));
    }

    if ($this->request->is(array('info', 'put'))) {
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

}
