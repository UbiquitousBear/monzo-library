<?php

namespace shamiln\monzo\Account;

use Shrikeh\Collection\ClosedOuterIteratorTrait;
use Shrikeh\Collection\ImmutableCollectionTrait;
use Shrikeh\Collection\NamedConstructorsTrait;
use Shrikeh\Collection\ObjectStorageTrait;
use Shrikeh\Collection\OuterIteratorTrait;

/**
 * Class AccountCollection.json
 * @package shamiln\monzo\Account
 */
class AccountCollection extends \IteratorIterator
{
    use NamedConstructorsTrait;
    use ImmutableCollectionTrait;
    use ClosedOuterIteratorTrait;
    use OuterIteratorTrait;
    use ObjectStorageTrait;

    /**
     * @param Account $object
     */
    protected function append(Account $object)
    {
        $this->getStorage()->attach($object);
    }

    /**
     * @param \Closure $closure
     * @return array
     */
    public function filter(\Closure $closure): array
    {
        $items = [];

        foreach ($this as $item) {
            if ($closure($item)) {
                $items[] = $item;
            }
        }

        return $items;
    }
}
