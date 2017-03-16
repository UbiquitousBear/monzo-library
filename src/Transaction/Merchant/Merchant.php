<?php

namespace shamiln\monzo\Transaction\Merchant;

use shamiln\monzo\Transaction\Merchant\Address\Address;
use shamiln\monzo\Transaction\Merchant\Metadata\Metadata;

class Merchant
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $groupId;

    /**
     * @var string
     */
    private $created;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $logo;

    /**
     * @var string
     */
    private $emoji;

    /**
     * @var string
     */
    private $category;

    /**
     * @var string
     */
    private $online;

    /**
     * @var string
     */
    private $atm;

    /**
     * @var Address
     */
    private $address;

    /**
     * @var string
     */
    private $updated;

    /**
     * @var Metadata
     */
    private $metadata;

    /**
     * @var string
     */
    private $disableFeedback;

    /** Constructor
     * @param string $id
     * @param string $groupId
     * @param string $created
     * @param string $name
     * @param string $logo
     * @param string $emoji
     * @param string $category
     * @param string $online
     * @param string $atm
     * @param Address $address
     * @param string $updated
     * @param Metadata $metadata
     * @param string $disable_feedback
     */

    public function __construct(
        string $id,
        string $groupId,
        string $created,
        string $name,
        string $logo,
        string $emoji,
        string $category,
        string $online,
        string $atm,
        Address $address,
        string $updated,
        Metadata $metadata,
        string $disable_feedback
    ) {
    
        $this->id = $id;
        $this->groupId = $groupId;
        $this->created = $created;
        $this->name = $name;
        $this->logo = $logo;
        $this->emoji = $emoji;
        $this->category = $category;
        $this->online = $online;
        $this->atm = $atm;
        $this->address = $address;
        $this->updated = $updated;
        $this->metadata = $metadata;
        $this->disableFeedback = $disable_feedback;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function groupId(): string
    {
        return $this->groupId;
    }

    /**
     * @return string
     */
    public function created(): string
    {
        return $this->created;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function logo(): string
    {
        return $this->logo;
    }

    /**
     * @return string
     */
    public function emoji(): string
    {
        return $this->emoji;
    }

    /**
     * @return string
     */
    public function category(): string
    {
        return $this->category;
    }

    /**
     * @return string
     */
    public function online(): string
    {
        return $this->online;
    }

    /**
     * @return string
     */
    public function atm(): string
    {
        return $this->atm;
    }

    /**
     * @return Address
     */
    public function address(): Address
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function updated(): string
    {
        return $this->updated;
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
    public function disableFeedback(): string
    {
        return $this->disableFeedback;
    }
}
