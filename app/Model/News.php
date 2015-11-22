<?php
App::uses('AppModel', 'Model');

/**
 * News Model
 *
 * @property Prefecture $Prefecture
 * @property Plan $Plan
 * @property option $option
 * @property PayStatus $PayStatus
 */
class News extends AppModel {
	var $name = 'News';
/**
 * Validation rules
 *
 */
	public $validate = array(
		'news_type_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'お知らせカテゴリを選択ください。',
			)
		),
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'タイトルを入力してください',
			),
			'maxlength' => array(
				'rule' => array('maxlength',100),
				'message' => '100文字以内にしてください',
			),
            array(
                'rule' => 'isUnique',
                'message' => 'この店舗コードは既に登録されています'
            ),
		),
		'content' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '内容を入力してください',
			),
			'maxlength' => array(
				'rule' => array('maxlength',500),
				'message' => '500文字以内にしてください',
			)
		)
	);
	
/**
 * News Model
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
		'NewsType' => array(
			'className' => 'NewsType',
			'foreignKey' => 'news_type_id',
			'conditions' => '',
			'fields' => 'id, name',
			'order' => ''
		)
	);
}