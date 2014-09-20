<?php
App::uses('AppModel', 'Model');
/**
 * Detalle Model
 *
 * @property Pago $Pago
 */
class Detalle extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Pago' => array(
			'className' => 'Pago',
			'foreignKey' => 'detalle_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
