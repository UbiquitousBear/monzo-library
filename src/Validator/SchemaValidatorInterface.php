<?php
namespace shamiln\monzo\Validator;

interface SchemaValidatorInterface
{
    /**
     * @param $payload
     * @return bool
     */
    public function isValid($payload): bool;
}
