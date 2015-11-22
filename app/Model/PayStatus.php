<?php
App::uses('AppModel', 'Model');

/**
 * PayStatus Model
 *
 * @property Shop $Shop
 */
class PayStatus extends AppModel {
/**
 * hasMany associations
 *
 */
	public $hasMany = array(
		'Shop' => array(
			'className' => 'Shop',
			'foreignKey' => 'pay_status_id',
			'dependent' => false,
		)
	);
}
