<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\ChoiceList\TimezoneChoiceList;

class TimezoneType extends AbstractType {
	/**
	 * {@inheritdoc}
	 */
	public function getDefaultOptions(array $options) {
		return array('choice_list' => new TimezoneChoiceList(),);
	}

	/**
	 * {@inheritdoc}
	 */
	public function getParent(array $options) {
		return 'choice';
	}

	/**
	 * {@inheritdoc}
	 */
	public function getName() {
		return 'timezone';
	}
}