<?php
App::uses('Corte', 'Model');

/**
 * Corte Test Case
 *
 */
class CorteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.corte',
		'app.producto'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Corte = ClassRegistry::init('Corte');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Corte);

		parent::tearDown();
	}

}
