<?php
class PostsController extends AppController {

	public $name = 'Posts';
	public $components = array('Transition', 'Session');
	public $helpers = array('Xform');


	function index() {
		$this->Post->recursive = 0;
		$this->set('posts', $this->paginate());
	}

	function add() {
		$this->Transition->checkData('confirm');
	}

	function confirm() {
		$this->params['xformHelperConfirmFlag'] = true;
		$this->Transition->automate('finish', null, 'add');
		$this->data = $this->Transition->mergedData();
		$this->render('add');
	}

	function finish() {
		$this->Transition->checkPrev(array('add', 'confirm'));
		$data = $this->Transition->mergedData();
		if ($this->Post->saveAll($data)) {
			$this->Transition->clearData();
			$this->Session->setFlash('登録完了');
			$this->redirect(array('action' => 'index'));
		} else {
			$this->redirect(array('action' => 'confirm'));
		}
	}


	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid post', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('post', $this->Post->read(null, $id));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid post', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash(__('The post has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Post->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for post', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Post->delete($id)) {
			$this->Session->setFlash(__('Post deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Post was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}