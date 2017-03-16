<?php

namespace shamiln\monzo\Balance;

class Balance
{
    /**
     * @var int
     */
    private $balance;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var int
     */
    private $spendToday;

    /**
     * @var string
     */
    private $localCurrency;

    /**
     * @var float
     */
    private $localExchangeRate;

    /**
     * @var array
     */
    private $localSpend;

    /**
     * Balance constructor.
     * @param $balance
     * @param $currency
     * @param $spendToday
     * @param $localCurrency
     * @param $localExchangeRate
     * @param $localSpend
     */
    public function __construct(
        int $balance,
        string $currency,
        int $spendToday,
        string $localCurrency = null,
        float $localExchangeRate = null,
        array $localSpend = []
    ) {
    
        $this->balance = $balance;
        $this->currency = $currency;
        $this->spendToday = $spendToday;
        $this->localCurrency = $localCurrency;
        $this->localExchangeRate = $localExchangeRate;
        $this->localSpend = $localSpend;
    }

    /**
     * @return mixed
     */
    public function balance(): int
    {
        return $this->balance;
    }

    /**
     * @return mixed
     */
    public function currency(): string
    {
        return $this->currency;
    }

    /**
     * @return mixed
     */
    public function spendToday(): int
    {
        return $this->spendToday;
    }

    /**
     * @return mixed
     */
    public function localCurrency(): string
    {
        return $this->localCurrency;
    }

    /**
     * @return mixed
     */
    public function localExchangeRate(): float
    {
        return $this->localExchangeRate;
    }

    /**
     * @return mixed
     */
    public function localSpend(): array
    {
        return $this->localSpend;
    }
}
