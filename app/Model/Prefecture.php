<?php
App::uses('AppModel', 'Model');

/**
 * Prefecture Model
 *
 * @property Shop $Shop
 */
class Prefecture extends AppModel {
/**
 * hasMany associations
 *
 */
	public $hasMany = array(
		'Shop' => array(
			'className' => 'Shop',
			'foreignKey' => 'prefecture_id',
			'dependent' => false,
		)
	);
}
