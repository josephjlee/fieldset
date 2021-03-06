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

use Fuel\Common\Arr;

/**
 * Handles fetching input data. This allows the fetching to be switched out later on.
 *
 * @package Fuel\Fieldset
 * @since   2.0
 * @author  Fuel Development Team
 */
class SimpleInput
{

	protected $get;
	protected $post;
	protected $config = [];

	/**
	 * @param array $config
	 *
	 * @since 2.0
	 */
	public function __construct(array $config = [])
	{
		//TODO: Add config entry to be able to switch priority of GET and POST
		$this->get = $_GET;
		$this->post = $_POST;
		$this->config += $config;
	}

	/**
	 * Gets GET data.
	 *
	 * @param  string|null $key     Key to fetch, or null to return the full array
	 * @param  mixed       $default Default value if the key does not exist
	 *
	 * @return mixed
	 *
	 * @since 2.0
	 */
	public function get($key = null, $default = null)
	{
		if ( is_null($key) )
		{
			return $this->get;
		}

		return Arr::get($this->get, $key, $default);
	}

	/**
	 * Gets POST data
	 *
	 * @param  string|null $key     Key to fetch, or null to return the full array
	 * @param  mixed       $default Default value if the key does not exist
	 *
	 * @return mixed
	 *
	 * @since 2.0
	 */
	public function post($key = null, $default = null)
	{
		if ( is_null($key) )
		{
			return $this->post;
		}

		return Arr::get($this->post, $key, $default);
	}

	/**
	 * Gets data from both POST and GET. When keys clash the value from POST will
	 * be used.
	 *
	 * @param  string|null $key     Key to fetch, or null to return the full array
	 * @param  mixed       $default Default value if the key does not exist
	 *
	 * @return mixed
	 *
	 * @since 2.0
	 */
	public function input($key = null, $default = null)
	{
		$combined = Arr::merge($this->get, $this->post);

		if ( is_null($key) )
		{
			return $combined;
		}

		return Arr::get($combined, $key, $default);
	}

	/**
	 * Gets a value from the Input config.
	 *
	 * @param  string|null $key Dot notated key or null for all
	 *
	 * @return string
	 *
	 * @since 2.0
	 */
	public function config($key = null)
	{
		if ( is_null($key) )
		{
			return $this->config;
		}

		return Arr::get($this->config, $key);
	}

}
