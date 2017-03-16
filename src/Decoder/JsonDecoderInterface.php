<?php
namespace shamiln\monzo\Decoder;

interface JsonDecoderInterface
{
    /**
     * @param string $payload
     * @return \stdClass
     */
    public function decode(string $payload): \stdClass;
}
