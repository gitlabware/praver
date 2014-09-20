<?php
App::uses('AppModel', 'Model');
/**
 * Pago Model
 *
 * @property Pedido $Pedido
 * @property Detalle $Detalle
 */
class Pago extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Pedido' => array(
			'className' => 'Pedido',
			'foreignKey' => 'pedido_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Detalle' => array(
			'className' => 'Detalle',
			'foreignKey' => 'detalle_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
