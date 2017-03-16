<?php

namespace spec\shamiln\monzo\Transaction\Hydrator;

use shamiln\monzo\Transaction\Metadata\Hydrator\MetadataHydrator;
use shamiln\monzo\Transaction\Attachment\Hydrator\AttachmentHydrator;
use shamiln\monzo\Transaction\Counterparty\Hydrator\CounterpartyHydrator;
use shamiln\monzo\Transaction\Merchant\Hydrator\MerchantHydrator;
use shamiln\monzo\Transaction\Attachment\Attachment;
use shamiln\monzo\Transaction\Counterparty\Counterparty;
use shamiln\monzo\Transaction\Merchant\Merchant;
use shamiln\monzo\Transaction\Metadata\Metadata;
use shamiln\monzo\Transaction\Transaction;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TransactionHydratorSpec extends ObjectBehavior
{
    public function let(
        \stdClass $dto,
        Merchant $merchant,
        Metadata $metadata,
        Attachment $attachment,
        Counterparty $counterparty,
        MetadataHydrator $metadataHydrator,
        AttachmentHydrator $attachmentsHydrator,
        CounterpartyHydrator $counterpartyHydrator,
        MerchantHydrator $merchantHydrator
    )
    {
        $dto->id = 'bar';
        $dto->created = '2016-04-14T18:24:26.333Z';
        $dto->description = 'NW CARD SERVICES       WESTCLIFF-ON- GBR';
        $dto->amount = '-100';
        $dto->currency = 'GBP';
        $dto->merchant = new \stdClass();
        $dto->notes = '';
        $dto->metadata = new \stdClass();
        $dto->account_balance = '9900';
        $dto->attachments = [];
        $dto->category = 'bills';
        $dto->is_load = '';
        $dto->settled = '';
        $dto->local_amount = '-100';
        $dto->local_currency = 'GBP';
        $dto->updated = '2016-04-14T18:24:27.078Z';
        $dto->account_id = 'foo';
        $dto->counterparty =  new \stdClass();
        $dto->scheme = 'gps_mastercard';
        $dto->dedupe_id = '7086';
        $dto->originator = '';
        $dto->include_in_spending = '1';

        $metadataHydrator->hydrate(new \stdClass)->willReturn($metadata);
        $merchantHydrator->hydrate(new \stdClass)->willReturn($merchant);
        $counterpartyHydrator->hydrate(new \stdClass)->willReturn($counterparty);
        $attachmentsHydrator->hydrate([])->willReturn($attachment);

        $this->beConstructedWith($metadataHydrator, $attachmentsHydrator, $counterpartyHydrator, $merchantHydrator);
    }

    public function it_can_hydrate_from_dto(
        $dto
    )
    {
        $this->hydrate($dto)->shouldBeAnInstanceOf(Transaction::class);
    }
}
