<?php

namespace shamiln\monzo\Transaction;

use DateTimeImmutable;
use shamiln\monzo\Transaction\Attachment\Attachment;
use shamiln\monzo\Transaction\Counterparty\Counterparty;
use shamiln\monzo\Transaction\Merchant\Merchant;
use shamiln\monzo\Transaction\Metadata\Metadata;

class Transaction
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var DateTimeImmutable
     */
    private $created;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $amount;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var Merchant
     */
    private $merchant;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var Metadata
     */
    private $metadata;

    /**
     * @var string
     */
    private $accountBalance;

    /**
     * @var Attachment
     */
    private $attachments;

    /**
     * @var string
     */
    private $category;

    /**
     * @var bool
     */
    private $isLoad;

    /**
     * @var string
     */
    private $settled;

    /**
     * @var string
     */
    private $localAmount;

    /**
     * @var string
     */
    private $localCurrency;

    /**
     * @var string
     */
    private $updated;

    /**
     * @var string
     */
    private $accountId;

    /**
     * @var Counterparty
     */
    private $counterparty;

    /**
     * @var string
     */
    private $scheme;

    /**
     * @var string
     */
    private $dedupeId;

    /**
     * @var string
     */
    private $originator;

    /**
     * @var bool
     */
    private $includeInSpending;

    /** Constructor
     * @param string $id
     * @param DateTimeImmutable $created
     * @param string $description
     * @param string $amount
     * @param string $currency
     * @param Merchant $merchant
     * @param string $notes
     * @param Metadata $metadata
     * @param string $accountBalance
     * @param Attachment $attachments
     * @param string $category
     * @param bool $isLoad
     * @param string $settled
     * @param string $localAmount
     * @param string $localCurrency
     * @param string $updated
     * @param string $account_id
     * @param Counterparty $counterparty
     * @param string $scheme
     * @param string $dedupeId
     * @param string $originator
     * @param bool $includeInSpending
     */

    public function __construct(
        string $id,
        DateTimeImmutable $created,
        string $description,
        string $amount,
        string $currency,
        Merchant $merchant = null,
        string $notes,
        Metadata $metadata = null,
        string $accountBalance,
        Attachment $attachments = null,
        string $category,
        bool $isLoad,
        string $settled,
        string $localAmount,
        string $localCurrency,
        string $updated,
        string $account_id,
        Counterparty $counterparty = null,
        string $scheme,
        string $dedupeId,
        string $originator,
        bool $includeInSpending
    ) {
    
        $this->id = $id;
        $this->created = $created;
        $this->description = $description;
        $this->amount = $amount;
        $this->currency = $currency;
        $this->merchant = $merchant;
        $this->notes = $notes;
        $this->metadata = $metadata;
        $this->accountBalance = $accountBalance;
        $this->attachments = $attachments;
        $this->category = $category;
        $this->isLoad = $isLoad;
        $this->settled = $settled;
        $this->localAmount = $localAmount;
        $this->localCurrency = $localCurrency;
        $this->updated = $updated;
        $this->accountId = $account_id;
        $this->counterparty = $counterparty;
        $this->scheme = $scheme;
        $this->dedupeId = $dedupeId;
        $this->originator = $originator;
        $this->includeInSpending = $includeInSpending;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }

    /**
     * @return DateTimeImmutable
     */
    public function created(): DateTimeImmutable
    {
        return $this->created;
    }

    /**
     * @return string
     */
    public function description(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function amount(): string
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function currency(): string
    {
        return $this->currency;
    }

    /**
     * @return Merchant
     */
    public function merchant(): ?Merchant
    {
        return $this->merchant;
    }

    /**
     * @return string
     */
    public function notes(): string
    {
        return $this->notes;
    }

    /**
     * @return Metadata
     */
    public function metadata(): Metadata
    {
        return $this->metadata;
    }

    /**
     * @return string
     */
    public function accountBalance(): string
    {
        return $this->accountBalance;
    }

    /**
     * @return Attachment
     */
    public function attachments(): Attachment
    {
        return $this->attachments;
    }

    /**
     * @return string
     */
    public function category(): string
    {
        return $this->category;
    }

    /**
     * @return bool
     */
    public function isLoad(): bool
    {
        return $this->isLoad;
    }

    /**
     * @return string
     */
    public function settled(): string
    {
        return $this->settled;
    }

    /**
     * @return string
     */
    public function localAmount(): string
    {
        return $this->localAmount;
    }

    /**
     * @return string
     */
    public function localCurrency(): string
    {
        return $this->localCurrency;
    }

    /**
     * @return string
     */
    public function updated(): string
    {
        return $this->updated;
    }

    /**
     * @return string
     */
    public function accountId(): string
    {
        return $this->accountId;
    }

    /**
     * @return Counterparty
     */
    public function counterparty(): Counterparty
    {
        return $this->counterparty;
    }

    /**
     * @return string
     */
    public function scheme(): string
    {
        return $this->scheme;
    }

    /**
     * @return string
     */
    public function dedupeId(): string
    {
        return $this->dedupeId;
    }

    /**
     * @return string
     */
    public function originator(): string
    {
        return $this->originator;
    }

    /**
     * @return bool
     */
    public function includeInSpending(): bool
    {
        return $this->includeInSpending;
    }
}
