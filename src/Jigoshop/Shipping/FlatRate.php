<?php

namespace Jigoshop\Shipping;

use Jigoshop\Core\Options;
use Jigoshop\Frontend\Cart;

class FlatRate implements Method
{
	const NAME = 'flat_rate';

	/** @var array */
	private $options;

	public function __construct(Options $options)
	{
		$this->options = $options->get('shipping.'.self::NAME);
	}

	/**
	 * @return string ID of shipping method.
	 */
	public function getId()
	{
		return self::NAME;
	}

	/**
	 * @return string Human readable name of method.
	 */
	public function getName()
	{
		return __('Flat rate', 'jigoshop');
	}

	/**
	 * @return bool Whether current method is enabled and able to work.
	 */
	public function isEnabled()
	{
		// TODO: Implement isEnabled() method.
		return $this->options['enabled'];
	}

	/**
	 * @return array List of options to display on Shipping settings page.
	 */
	public function getOptions()
	{
		return array(
			array(
				'name' => sprintf('[%s][enabled]', self::NAME),
				'title' => __('Is enabled?', 'jigoshop'),
				'type' => 'checkbox',
				'value' => $this->options['enabled'],
			),
		);
	}

	/**
	 * Validates and returns properly sanitized options.
	 *
	 * @param $settings array Input options.
	 * @return array Sanitized result.
	 */
	public function validateOptions($settings)
	{
		$settings['enabled'] = $settings['enabled'] == 'on';

		return $settings;
	}

	/**
	 * @param Cart $cart Cart to calculate shipping for.
	 * @return float Calculates value of shipping for the cart.
	 */
	public function calculate(Cart $cart)
	{
		// TODO: Implement calculate() method.
		return 1.0;
	}
}