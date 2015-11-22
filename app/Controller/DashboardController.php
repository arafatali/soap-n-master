<?php

class DashboardController extends AppController {
	public $name = 'Dashboard';
	public $uses = array();
	
    public function beforeFilter() {
        //$this->layout = 'default_admin';
		return $this->redirect(array('controller' => 'shop', 'action' => 'index'));
    }
	public function index() {
		//関西版のサイト名
		$this->set('site_name', '店舗管理');
	}
}
?>