<?php
App::uses('AppModel', 'Model');
/**
 * Parametro Model
 *
 * @property Gasto $Gasto
 */
class Parametro extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Gasto' => array(
			'className' => 'Gasto',
			'foreignKey' => 'gasto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
