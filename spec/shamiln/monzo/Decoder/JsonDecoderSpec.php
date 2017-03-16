<?php

namespace spec\shamiln\monzo\Decoder;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use \Webmozart\Json\JsonDecoder as Decoder;

class JsonDecoderSpec extends ObjectBehavior
{
    private $schemaPath = 'foo/bar';
    /**
     * @var \SplFileInfo
     */
    private $fileInfo;

    public function let(
        Decoder $decoder
    )
    {
        $this->fileInfo = new \SplFileInfo($this->schemaPath);
        $this->beConstructedWith($decoder, $this->fileInfo);
    }

    public function it_decodes_a_payload(
        $decoder,
        \stdClass $dto
    )
    {
        $json = '{}';
        $decoder->decode($json, $this->fileInfo->getRealPath())->willReturn($dto);
    }
}
