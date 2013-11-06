<?php
/**
 * @package   Fuel\Fieldset
 * @version   2.0
 * @author    Fuel Development Team
 * @license   MIT License
 * @copyright 2010 - 2013 Fuel Development Team
 * @link      http://fuelphp.com
 */

namespace Fuel\Fieldset\Input;

use Fuel\Fieldset\Input;

/**
 * Defines a reset input
 *
 * @package Fuel\Fieldset\Input
 * @author  Fuel Development Team
 */
class Reset extends Input
{

	/**
	 * @param string $name
	 * @param array  $attributes
	 * @param mixed  $value
	 */
	public function __construct($name = '', array $attributes = [], $value = null)
	{
		$attributes['type'] = 'reset';
		parent::__construct($name, $attributes, $value);
	}

}
