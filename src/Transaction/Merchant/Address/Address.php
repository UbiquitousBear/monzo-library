<?php

namespace shamiln\monzo\Transaction\Merchant\Address;

class Address
{
    /**
     * @var string
     */
    private $shortFormatted;

    /**
     * @var string
     */
    private $formatted;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $region;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $postcode;

    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    /**
     * @var int
     */
    private $zoomLevel;

    /**
     * @var bool
     */
    private $approximate;

    /**
     * Address constructor.
     * @param string $shortFormatted
     * @param string $formatted
     * @param string $address
     * @param string $city
     * @param string $region
     * @param string $country
     * @param string $postcode
     * @param float $latitude
     * @param float $longitude
     * @param int $zoomLevel
     * @param bool $approximate
     */
    public function __construct(
        string $shortFormatted,
        string $formatted,
        string $address,
        string $city,
        string $region,
        string $country,
        string $postcode,
        float $latitude,
        float $longitude,
        int $zoomLevel,
        bool $approximate
    ) {
    
        $this->shortFormatted = $shortFormatted;
        $this->formatted = $formatted;
        $this->address = $address;
        $this->city = $city;
        $this->region = $region;
        $this->country = $country;
        $this->postcode = $postcode;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->zoomLevel = $zoomLevel;
        $this->approximate = $approximate;
    }

    /**
     * @return string
     */
    public function shortFormatted(): string
    {
        return $this->shortFormatted;
    }

    /**
     * @return string
     */
    public function formatted(): string
    {
        return $this->formatted;
    }

    /**
     * @return string
     */
    public function address(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function tity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function region(): string
    {
        return $this->region;
    }

    /**
     * @return string
     */
    public function country(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function postcode(): string
    {
        return $this->postcode;
    }

    /**
     * @return float
     */
    public function latitude(): float
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function longitude(): float
    {
        return $this->longitude;
    }

    /**
     * @return int
     */
    public function zoomLevel(): int
    {
        return $this->zoomLevel;
    }

    /**
     * @return bool
     */
    public function isApproximate(): bool
    {
        return $this->approximate;
    }
}
