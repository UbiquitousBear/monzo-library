<?php

namespace shamiln\monzo\Decoder;

use Webmozart\Json\DecodingFailedException;
use \Webmozart\Json\JsonDecoder as WebmozartJsonDecoder;
use Webmozart\Json\ValidationFailedException;

class JsonDecoder implements JsonDecoderInterface
{
    /**
     * @var WebmozartJsonDecoder
     */
    private $decoder;

    /**
     * @var \SplFileInfo
     */
    private $schema;

    /**
     * JsonDecoder constructor.
     * @param WebmozartJsonDecoder $decoder
     * @param \SplFileInfo $schema
     */
    public function __construct(WebmozartJsonDecoder $decoder, \SplFileInfo $schema)
    {
        $this->decoder = $decoder;
        $this->schema = $schema;
    }

    /**
     * {@inheritdoc}
     */
    public function decode(string $payload): \stdClass
    {
        return $this->decodePayload($payload);
    }

    /**
     * @param string $payload
     * @return mixed
     */
    private function decodePayload(string $payload)
    {
        try {
            return $this->decoder->decode(
                $payload,
                $this->schema->getRealPath()
            );
        } catch (ValidationFailedException $ex) {
            // payload failed to validate
        } catch (DecodingFailedException $ex) {
            // Unable to decode payload;
        }
    }
}
