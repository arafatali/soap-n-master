<?php
App::uses('AppController', 'Controller');
/**
 * Shop Controller
 *
 * @property Shop $Shop
 */
class NewsController extends AppController {
/**
 * Module name
 *
 */
	public $name = 'News';

/**
 * Use Model
 *
 */
	public $uses = array(
		'News',
		'NewsType',
	);
	
/**
 * Paginate setting
 *
 */
	public $paginate = array(
		'News' => array(
			'order' => array(
				'modified' => 'DESC',
			),
			'limit' => 30,
		),
	);
	


    public function beforeFilter() {
		$this->set('site_name', Configure::read('site_name'));
        $this->layout = 'default_admin';
        
    }

	public function beforeRender() {
		/** 支払い情報を取得する */
		$newsTypes = $this->NewsType->find('all');
		/** プルダウン用にデータを整える */
		$newsTypes = Set::Combine($newsTypes, '{n}.NewsType.id', '{n}.NewsType.name');

		$this->set('newsTypes', $newsTypes);
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
				$searchword = $this->request->data['News'];
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
		$this->set('newsList', $this->paginate($option));
	}
	
/**
 * add method
 */
	public function add(){
		if ($this->request->is('post')) {
			$this->News->create();
			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash(__('お知らせの作成は成功しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('お知らせの作成は失敗しました。'));
			}
		}
	}
	
/**
 * edit method
 */
	public function edit($id = null) {
		$this->News->id = $id;
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash(__('お知らせの作成は成功しました。'), 'Flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('お知らせの作成は失敗しました。'));
			}
		} else {
			$this->request->data = $this->News->read(null, $id);
		}
	}

}