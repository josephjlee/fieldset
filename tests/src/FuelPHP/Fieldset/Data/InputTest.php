<?php
/**
 * @package   Fuel\Fieldset
 * @version   2.0
 * @author    Fuel Development Team
 * @license   MIT License
 * @copyright 2010 - 2013 Fuel Development Team
 * @link      http://fuelphp.com
 */

namespace Fuel\Fieldset\Data;

/**
 * Tests for Input
 *
 * @package Fuel\Fieldset\Data
 * @author  Fuel Development Team
 */
class InputTest extends \PHPUnit_Framework_TestCase
{

	public function setUp()
	{
		$_POST = [];
		$_GET = [];
	}

	/**
	 * @covers Fuel\Fieldset\Data\Input::get
	 * @group  Fieldset
	 */
	public function testGet()
	{
		$_GET['mockdata'] = 'some data';

		$object = new Input;

		$this->assertEquals('some data', $object->get('mockdata'));
	}

	/**
	 * @covers Fuel\Fieldset\Data\Input::get
	 * @group  Fieldset
	 */
	public function testGetNested()
	{
		$_GET['mockdata'] = ['subkey' => 'foobar'];

		$object = new Input;

		$this->assertEquals('foobar', $object->get('mockdata.subkey'));
	}

	/**
	 * @covers Fuel\Fieldset\Data\Input::get
	 * @group  Fieldset
	 */
	public function testGetAll()
	{
		$_GET['mockdata'] = ['subkey' => 'foobar'];

		$object = new Input;

		$this->assertEquals($_GET, $object->get());
	}

	/**
	 * @covers Fuel\Fieldset\Data\Input::post
	 * @group  Fieldset
	 */
	public function testPost()
	{
		$_POST['mockdata'] = 'some data';

		$object = new Input;

		$this->assertEquals('some data', $object->post('mockdata'));
	}

	/**
	 * @covers Fuel\Fieldset\Data\Input::post
	 * @group  Fieldset
	 */
	public function testPostNested()
	{
		$_POST['mockdata'] = ['subkey' => 'foobar'];

		$object = new Input;

		$this->assertEquals('foobar', $object->post('mockdata.subkey'));
	}

	/**
	 * @covers Fuel\Fieldset\Data\Input::post
	 * @group  Fieldset
	 */
	public function testPostAll()
	{
		$_POST['mockdata'] = ['subkey' => 'foobar'];

		$object = new Input;

		$this->assertEquals($_POST, $object->post());
	}

	/**
	 * @covers Fuel\Fieldset\Data\Input::input
	 * $group  Fieldset
	 */
	public function testInput()
	{
		$_POST['mockdata'] = 'foobar';

		$object = new Input;

		$this->assertEquals('foobar', $object->input('mockdata'));
	}

	/**
	 * @covers Fuel\Fieldset\Data\Input::input
	 * @group  Fieldset
	 */
	public function testInputNested()
	{
		$_POST['mockdata'] = ['subkey' => 'foobar'];

		$object = new Input;

		$this->assertEquals('foobar', $object->input('mockdata.subkey'));
	}

	/**
	 * @covers Fuel\Fieldset\Data\Input::input
	 * @group  Fieldset
	 */
	public function testInputAll()
	{
		$_POST['mockdata'] = ['one' => 'first value', 'three' => 'overridden'];
		$_GET['mockdata'] = ['two' => 'second value', 'three' => 'third value'];

		$object = new Input;

		$expected = [
			'mockdata' => [
				'one' => 'first value',
				'two' => 'second value',
				'three' => 'overridden',
			]
		];

		$this->assertEquals($expected, $object->input());
	}

	/**
	 * @covers Fuel\Fieldset\Data\Input::__construct
	 * @covers Fuel\Fieldset\Data\Input::config
	 * @group Fieldset
	 */
	public function testConfig()
	{
		$object = new Input(['testconfig' => 'foobar']);

		$this->assertEquals('foobar', $object->config('testconfig'));
	}

	/**
	 * @covers Fuel\Fieldset\Data\Input::__construct
	 * @covers Fuel\Fieldset\Data\Input::config
	 * @group Fieldset
	 */
	public function testConfigAll()
	{
		$config = [
			'foo' => 'bar',
			'baz' => 'bat',
		];

		$object = new Input($config);

		$this->assertEquals($config, $object->config());
	}

}
