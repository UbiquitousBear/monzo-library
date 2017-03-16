<?php
namespace shamiln\monzo\Transaction;

use IteratorIterator;
use Shrikeh\Collection\ClosedOuterIteratorTrait;
use Shrikeh\Collection\ImmutableCollectionTrait;
use Shrikeh\Collection\NamedConstructorsTrait;
use Shrikeh\Collection\ObjectStorageTrait;
use Shrikeh\Collection\OuterIteratorTrait;
use Shrikeh\Collection\Immutable;

class TransactionCollection extends IteratorIterator implements Immutable
{
    use NamedConstructorsTrait;
    use ImmutableCollectionTrait;
    use ClosedOuterIteratorTrait;
    use OuterIteratorTrait;
    use ObjectStorageTrait;

    /**
     * @param Transaction $object
     */
    protected function append(Transaction $object)
    {
        $this->getStorage()->attach($object);
    }
}
