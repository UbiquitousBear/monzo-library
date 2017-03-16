<?php

namespace shamiln\monzo\Transaction\Merchant\Metadata;

class Metadata
{
    /**
     * @var string
     */
    private $createdForMerchant;

    /**
     * @var string
     */
    private $createdForTransaction;

    /**
     * @var string
     */
    private $enrichedFromSettlement;

    /**
     * @var string
     */
    private $suggestedTags;

    /**
     * Metadata constructor.
     * @param string $createdForMerchant
     * @param string $createdForTransaction
     * @param string $enrichedFromSettlement
     * @param string $suggestedTags
     */
    public function __construct(
        string $createdForMerchant = null,
        string $createdForTransaction = null,
        string $enrichedFromSettlement = null,
        string $suggestedTags = null
    ) {
    
        $this->createdForMerchant = $createdForMerchant;
        $this->createdForTransaction = $createdForTransaction;
        $this->enrichedFromSettlement = $enrichedFromSettlement;
        $this->suggestedTags = $suggestedTags;
    }


    /**
     * @return string
     */
    public function createdForMerchant(): ?string
    {
        return $this->createdForMerchant;
    }

    /**
     * @return string
     */
    public function createdForTransaction(): ?string
    {
        return $this->createdForTransaction;
    }

    /**
     * @return string
     */
    public function enrichedFromSettlement(): ?string
    {
        return $this->enrichedFromSettlement;
    }

    /**
     * @return string
     */
    public function suggestedTags(): ?string
    {
        return $this->suggestedTags;
    }
}
