<?php

class UsersController extends AppController {

	public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('User.username' => 'asc') 
    );
	
    public function beforeFilter() {
        $this->Auth->allow('login','add');
		parent::beforeFilter();
    }
	


	public function login() {
		
		//if already logged-in, redirect
		if($this->Session->check('Auth.User')){
			$this->redirect(array('action' => 'index'));		
		}
		
		// if we get the post information, try to authenticate
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')), 'default', array('class' => 'alert-success'));
				$this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash(__('Invalid username or password'), 'default', array('class' => 'alert-danger'));
			}
		} 
	}

/**
 * logout method
 */
	public function logout() {
		$this->Session->destroy();
		$this->redirect($this->Auth->logout());
	}

    public function index() {
		$this->paginate = array(
			'limit' => 6,
			'order' => array('User.username' => 'asc' )
		);
		$users = $this->paginate('User');
		$this->set(compact('users'));
    }


    public function add() {
        if ($this->request->is('post')) {
				
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been created'), 'default', array('class' => 'alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be created. Please, try again.'), 'default', array('class' => 'alert-danger'));
			}	
        }
    }

 public function edit($id = null) {

if (!$id) {
$this->Session->setFlash('Please provide a user id', 'default', array('class' => 'alert-success'));
$this->redirect(array('action'=>'index')); //need to change this for redirect to page it came from
}

$user = $this->User->findById($id);
if (!$user) {
$this->Session->setFlash('Invalid User ID Provided', 'default', array('class' => 'alert-danger'));
$this->redirect(array('action'=>'index')); //check
}

if ($this->request->is('post') || $this->request->is('put')) {
$this->User->id = $id;

if (!$this->data['User']['password_update']) { // check if password is empty

// just save updated email as nothing else has changed, first check it is new

$newemail = $this->data['User']['email'];
if ($newemail == $user['User']['email']) {
$this->Session->setFlash(__('No changes made!'), 'default', array('class' => 'alert-success'));
} else {
$this->User->saveField('email', $newemail);
$this->Session->setFlash(__('The user email has been updated'), 'default', array('class' => 'alert-success'));
$this->redirect(array('action' => 'index', $id));
}
} else { // not empty so save all new data

if ($this->User->save($this->request->data)) {
$this->Session->setFlash(__('The user has been updated'), 'default', array('class' => 'alert-success'));
$this->redirect(array('action' => 'index', $id));
} else {
$this->Session->setFlash(__('Unable to update your user.'), 'default', array('class' => 'alert-danger'));
}
}
}

if (!$this->request->data) {
$this->request->data = $user;
}
}

    public function delete($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a user id', 'default', array('class' => 'alert-danger'));
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided', 'default', array('class' => 'alert-danger'));
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 0)) {
            $this->Session->setFlash(__('User deleted'), 'default', array('class' => 'alert-success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'), 'default', array('class' => 'alert-danger'));
        $this->redirect(array('action' => 'index'));
    }
	
	public function activate($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a user id', 'default', array('class' => 'alert-danger'));
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided', 'default', array('class' => 'alert-danger'));
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('User re-activated'), 'default', array('class' => 'alert-warning'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not re-activated'), 'default', array('class' => 'alert-warning'));
        $this->redirect(array('action' => 'index'));
    }

}

?>