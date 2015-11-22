<?php
App::uses('AppController', 'Controller');
/**
 * Shop Controller
 *
 * @property Shop $Shop
 */
class ShopController extends AppController {
/**
 * Module name
 *
 */
	public $name = 'Shop';

/**
 * Use Model
 *
 */
	public $uses = array(
		'Shop',
		'Prefecture',
		'Plan',
		'Option',
		'PayStatus',
	);
	
/**
 * Paginate setting
 *
 */
	public $paginate = array(
		'Shop' => array(
			'order' => array(
				'modified' => 'DESC',
			),
			'limit' => 30,
			//'paramType' => 'querystring'
		),
	);
	


    public function beforeFilter() {
		$this->set('site_name', Configure::read('site_name'));
        $this->layout = 'default_admin';
        
    }

	public function beforeRender() {
		/** 掲載エリア情報を取得する */
		$prefectures = $this->Prefecture->find('all');
		/** プルダウン用にデータを整える */
		$prefectures = Set::Combine($prefectures, '{n}.Prefecture.id', '{n}.Prefecture.pref_name');
		
		/** 掲載プラン情報を取得する */
		$plans = $this->Plan->find('all');
		/** プルダウン用にデータを整える */
		$plans = Set::Combine($plans, '{n}.Plan.id', '{n}.Plan.plan_name');
		
		/** オプション情報を取得する */
		$options = $this->Option->find('all');
		/** プルダウン用にデータを整える */
		$options = Set::Combine($options, '{n}.Option.id', '{n}.Option.option_name');
		
		/** 支払い情報を取得する */
		$payStatuses = $this->PayStatus->find('all');
		/** プルダウン用にデータを整える */
		$payStatuses = Set::Combine($payStatuses, '{n}.PayStatus.id', '{n}.PayStatus.pay_status_name');
		
		$this->set('prefectures', $prefectures);
		$this->set('plans', $plans);
		$this->set('options', $options);
		$this->set('payStatuses', $payStatuses);
	}
/**
 * index method
 */
	public function index() {
		$option = array();
		$searchword = array();
		$lasttrade_start = null;
		$lasttrade_end = null;
		if (!empty($this->data)) {
			if (!isset($this->request->data['clear'])) {
				$searchword = $this->request->data['Shop'];
				foreach ($searchword as $search_key => $search_value) {
					if (isset($search_value) && $search_value != '') {
						if (strstr($search_key, '_id')) {
							/** _idを含む場合、完全一致にする */
							$option[$search_key] = $search_value;
						} elseif (strstr($search_key, 'lasttrade')) {
							/** 日付の検索 */
							$year = strval($search_value['year']);
							$month = strval($search_value['month']);
							$day = strval($search_value['day']);

							if (!empty($year) && !empty($month) && !empty($day)) {
								/** 日付が存在するか確認 */
								if (checkdate($month, $day, $year)) {
									if(strstr($search_key, '_start')) {
										$lasttrade_start = $year.'-'.$month.'-'.$day;
									} elseif(strstr($search_key, '_end')) {
										$lasttrade_end = $year.'-'.$month.'-'.$day;
									}
								}
							}
						} else {
							/** その他の項目は部分一致 */
							$option[$search_key.' LIKE'] = "%{$search_value}%";
						}
					}
				}
				/** 開始日と終了日を検索する */
				if ($lasttrade_start || $lasttrade_end) {
					if ($lasttrade_start == null) {
						$lasttrade_start = date('Y')-100 .'-'. date('m') .'-'. date('d');
					}
					if ($lasttrade_end == null) {
						$lasttrade_end = date('Y')+100 .'-'. date('m') .'-'. date('d');
					}
					$option['lasttrade BETWEEN ? AND ?'] = array($lasttrade_start, $lasttrade_end);
				}
			} else {
				/** 検索内容のクリア */
				$this->redirect(array('action' => 'index'));
			}
		}

		/** テンプレートに出力 */
		$this->set('searchword', $searchword);
		$this->set('shops', $this->paginate($option));
	}
	
/**
 * add method
 */
	public function add(){
		if ($this->request->is('post')) {
			$this->Shop->create();
			if ($this->Shop->save($this->request->data)) {
				$this->Session->setFlash(__('店舗の登録に成功しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('店舗の登録に失敗しました。'));
			}
		}
	}
	
/**
 * edit method
 */
	public function edit($id = null) {
		$this->Shop->id = $id;
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Shop->save($this->request->data)) {
				$this->Session->setFlash(__('顧客の登録に成功しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('顧客の登録に失敗しました。'));
			}
		} else {
			$this->request->data = $this->Shop->read(null, $id);
		}
	}

/*
	public function beforeRender() {
		$this->set('areaList', $this->Area->find('list', array('order' => array('Area.id ASC'))));
		$this->set('planList', $this->Plan->find('list', array('order' => array('Plan.id ASC'))));
		$this->set('optionList', $this->Option->find('list', array('order' => array('Option.id ASC'))));
		$this->set('payStatusList', $this->Pay_status->find('list', array('order' => array('Pay_status.id ASC'))));
	}

	public function index(){

		$shopList = $this->paginate();		
		$this->set(compact('shopList'));

	}


	public function delete($id) {

		if($this->request->isDelete()) {
			if ($this->Shop->delete($id)) {
				$this->Session->setFlash('店舗を削除しました。');
			} else {
				$this->Session->setFlash('店舗の削除に失敗しました。');
			}
			$this->redirect(array('action'=> 'index'));
		}

		$this->request->data = $this->Shop->findById($id);
		if (empty($this->request->data)) {
			$this->Session->setFlash('店舗が見つかりませんでした。');
			$this->redirect(array('action'=> 'index'));
		}

	}


	public function add() {

		return $this->edit();

	}


	public function edit($id = null) {

		if($this->request->isPost() || $this->request->isPut()) {
			if($this->Shop->save($this->request->data)) {
				$this->Session->setFlash('店舗情報を保存しました。');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('入力に間違いがあります。');
			}
		} else {
			if($id !== null) {
				$this->request->data = $this->Shop->findById($id);
				if(empty($this->request->data)) {
					$this->Session->setFlash('店舗が見つかりませんでした。');
					$this->redirect(array('action'=> 'index'));
				}
			}
		}

		$this->render('edit');

	}
*/

}