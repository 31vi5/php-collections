<?php

/**
 * @copyright   Copyright (c) 2018 gameeapp.com <hello@gameeapp.com>
 * @author      Pavel Janda <pavel@gameeapp.com>
 * @package     Gamee
 */

declare(strict_types=1);

namespace Gamee\Collections\Collection;

use Gamee\Collections\Iterator\ObjectIterator;

abstract class ImmutableObjectCollection extends ObjectIterator
{

	/**
	 * @throws \InvalidArgumentException
	 */
	public function addItem($item): self
	{
		$classItemName = $this->getItemType();

		if (!$item instanceof $classItemName) {
			throw new \InvalidArgumentException(get_class($this) . '::addItem() only accepts ' . $this->getItemType());
		}

		return new static($this->data + [$item]);
	}


	abstract protected function getItemType(): string;
}
