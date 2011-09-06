<?php
/**
 * Domains Controller
 *
 * @property Domain $Domain
 */
class DomainsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Domain->recursive = 0;
		$this->set('domains', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Domain->id = $id;
		if (!$this->Domain->exists()) {
			throw new NotFoundException(__('Invalid domain'));
		}
		$this->set('domain', $this->Domain->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Domain->create();
			if ($this->Domain->save($this->request->data)) {
				$this->Session->setFlash(__('The domain has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The domain could not be saved. Please, try again.'));
			}
		}
		$sites = $this->Domain->Site->find('list');
		$this->set(compact('sites'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Domain->id = $id;
		if (!$this->Domain->exists()) {
			throw new NotFoundException(__('Invalid domain'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Domain->save($this->request->data)) {
				$this->Session->setFlash(__('The domain has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The domain could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Domain->read(null, $id);
		}
		$sites = $this->Domain->Site->find('list');
		$this->set(compact('sites'));
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
		$this->Domain->id = $id;
		if (!$this->Domain->exists()) {
			throw new NotFoundException(__('Invalid domain'));
		}
		if ($this->Domain->delete()) {
			$this->Session->setFlash(__('Domain deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Domain was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
