<?php
App::uses('AppModel', 'Model');

/**
 * Option Model
 *
 * @property Shop $Shop
 */
class Option extends AppModel {
/**
 * hasMany associations
 *
 */
	public $hasMany = array(
		'Shop' => array(
			'className' => 'Shop',
			'foreignKey' => 'option_id',
			'dependent' => false,
		)
	);
}
