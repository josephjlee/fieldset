<?php

/**
 * Part of the FuelPHP framework.
 *
 * @package   FuelPHP\Fieldset\Input
 * @version   2.0
 * @license   MIT License
 * @copyright 2010 - 2013 Fuel Development Team
 */

namespace FuelPHP\Fieldset\Input;

use FuelPHP\Fieldset\Input;

/**
 * 
 *
 * @package FuelPHP\Fieldset\Input
 * @since   2.0.0
 * @author  Fuel Development Team
 */
class Password extends Input
{

	public function __construct($name = '', array $attributes = array(),
		$value = null)
	{
		$attributes['type'] = 'password';
		parent::__construct($name, $attributes, $value);
	}

}