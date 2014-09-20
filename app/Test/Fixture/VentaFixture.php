<?php
/**
 * VentaFixture
 *
 */
class VentaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'cliente_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'total' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '8,2'),
		'saldo' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '8,2'),
		'crated' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'cliente_id' => 1,
			'user_id' => 1,
			'total' => 1,
			'saldo' => 1,
			'crated' => '2014-01-03 23:17:35'
		),
	);

}
