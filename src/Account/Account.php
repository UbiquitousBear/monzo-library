<?php

namespace shamiln\monzo\Account;

/**
 * Class Account
 * @package shamiln\monzo\Account
 */
class Account
{

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $created;

    /**
     * Account constructor.
     * @param string $id
     * @param string $description
     * @param string $created
     */
    public function __construct(string $id, string $description, string $created)
    {
        $this->id = $id;
        $this->description = $description;
        $this->created = $created;
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
    public function description(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function created(): string
    {
        return $this->created;
    }


    public function __toString(): string
    {
        return \json_encode([
            'id' => $this->id,
            'description' => $this->description,
            'created' => $this->created,
        ]);
    }
}
