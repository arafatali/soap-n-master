<?php
App::uses('AppModel', 'Model');

/**
 * Plan Model
 *
 * @property Shop $Shop
 */
class Plan extends AppModel {
/**
 * hasMany associations
 *
 */
	public $hasMany = array(
		'Shop' => array(
			'className' => 'Shop',
			'foreignKey' => 'plan_id',
			'dependent' => false,
		)
	);
}
