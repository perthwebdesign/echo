<?php
/**
 * Sites Controller
 *
 * @property Site $Site
 */
class SitesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Site->recursive = 0;
		$this->set('sites', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Site->id = $id;
		if (!$this->Site->exists()) {
			throw new NotFoundException(__('Invalid site'));
		}
		$this->set('site', $this->Site->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Site->create();
			if ($this->Site->save($this->request->data)) {
				$this->Session->setFlash(__('The site has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The site could not be saved. Please, try again.'));
			}
		}
		$clients = $this->Site->Client->find('list');
		$this->set(compact('clients'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Site->id = $id;
		if (!$this->Site->exists()) {
			throw new NotFoundException(__('Invalid site'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Site->save($this->request->data)) {
				$this->Session->setFlash(__('The site has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The site could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Site->read(null, $id);
		}
		$clients = $this->Site->Client->find('list');
		$this->set(compact('clients'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Site->id = $id;
		if (!$this->Site->exists()) {
			throw new NotFoundException(__('Invalid site'));
		}
		if ($this->Site->delete()) {
			$this->Session->setFlash(__('Site deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Site was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
