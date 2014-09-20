<?php
/**
 * MovimientoFixture
 *
 */
class MovimientoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'producto_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'ingreso' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'salida' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'total' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'almacene_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'uporcaja' => array('type' => 'integer', 'null' => true, 'default' => null),
		'uporcaja_salida' => array('type' => 'integer', 'null' => true, 'default' => null),
		'venta_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'producto_id' => 1,
			'ingreso' => 1,
			'salida' => 1,
			'total' => 1,
			'almacene_id' => 1,
			'uporcaja' => 1,
			'uporcaja_salida' => 1,
			'venta_id' => 1,
			'created' => '2014-01-03 23:18:01'
		),
	);

}
