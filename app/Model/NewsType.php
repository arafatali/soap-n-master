<?php
App::uses('AppModel', 'Model');

/**
 * NewsType Model
 *
 * @property Shop $Shop
 */
class NewsType extends AppModel {
/**
 * hasMany associations
 *
 */
	public $hasMany = array(
		'News' => array(
			'className' => 'News',
			'foreignKey' => 'id',
			'dependent' => false,
		)
	);
}
