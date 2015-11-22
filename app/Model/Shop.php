<?php
App::uses('AppModel', 'Model');

/**
 * Shop Model
 *
 * @property Prefecture $Prefecture
 * @property Plan $Plan
 * @property option $option
 * @property PayStatus $PayStatus
 */
class Shop extends AppModel {
	var $name = 'Shop';
/**
 * Validation rules
 *
 */
	public $validate = array(
		'shop_cd' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '店舗コードを入力してください',
			),
			'maxlength' => array(
				'rule' => array('maxlength',8),
				'message' => '8半角英数字以内にしてください',
			),
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				'message' => '数値を入力してください',
			),
            array(
                'rule' => 'isUnique',
                'message' => 'この店舗コードは既に登録されています'
            ),
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '店舗名を入力してください',
			),
			'maxlength' => array(
				'rule' => array('maxlength',30),
				'message' => '30文字以内にしてください',
			),
		),
		'prefecture_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '掲載エリアを選択してください',
			),
		),
		'plan_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '掲載プランを選択してください',
			),
		),
		'option_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '掲載オプションを選択してください',
			),
		),
		'pay_status_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '支払い状態を選択してください',
			),
		),
		'payer' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '振込み名義を入力してください',
			),
			'maxlength' => array(
				'rule' => array('maxlength',30),
				'message' => '振込み名義を30文字以内にしてください',
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message'=>'メールアドレスを正しく入力してください。',
			),
		),
		'tel' => array(
			'phone' => array(
				'rule'=>array('custom','/\d{2,4}-\d{2,4}-\d{4}/'),
				'message'=>'電話番号を正しく入力してください。',
			),
		),
		'ranking_pt' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'ランキングptを入力してください',
			),
			'maxlength' => array(
				'rule' => array('maxlength',8),
				'message' => '8文字以内にしてください',
			),
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				'message' => '数値を入力してください',
			),
		),
		'get_pt' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '獲得ptを入力してください',
			),
			'maxlength' => array(
				'rule' => array('maxlength',8),
				'message' => '8文字以内にしてください',
			),
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				'message' => '数値を入力してください',
			),
		),
		'created' => array(
		),
		'modified' => array(
		),
		'violation_cnt' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'ランキングptを入力してください',
			),
			'maxlength' => array(
				'rule' => array('maxlength',8),
				'message' => '8文字以内にしてください',
			),
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				'message' => '数値を入力してください',
			),
		)
	);
	
/**
 * Shop Model
 *
 * @property Prefecture $Prefecture
 * @property Plan $Plan
 * @property option $option
 * @property Pay_status $Pay_status
 */
/**
 * belongsTo associations
 *
 */
	public $belongsTo = array(
		'Prefecture' => array(
			'className' => 'Prefecture',
			'foreignKey' => 'prefecture_id',
			'conditions' => '',
			'fields' => 'id, pref_name',
			'order' => ''
		),
		'Plan' => array(
			'className' => 'Plan',
			'foreignKey' => 'plan_id',
			'conditions' => '',
			'fields' => 'id, plan_name',
			'order' => ''
		),
		'Option' => array(
			'className' => 'Option',
			'foreignKey' => 'option_id',
			'conditions' => '',
			'fields' => 'id, option_name',
			'order' => ''
		),
		'PayStatus' => array(
			'className' => 'PayStatus',
			'foreignKey' => 'pay_status_id',
			'conditions' => '',
			'fields' => 'id, pay_status_name',
			'order' => ''
		)
	);
}