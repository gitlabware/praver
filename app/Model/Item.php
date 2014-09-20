<?php
App::uses('AppModel', 'Model');
/**
 * Item Model
 *
 * @property Pedido $Pedido
 * @property Producto $Producto
 * @property Almacene $Almacene
 */
class Item extends AppModel {


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
		'Producto' => array(
			'className' => 'Producto',
			'foreignKey' => 'producto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Almacene' => array(
			'className' => 'Almacene',
			'foreignKey' => 'almacene_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
