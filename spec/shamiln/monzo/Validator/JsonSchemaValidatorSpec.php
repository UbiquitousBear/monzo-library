<?php

namespace spec\shamiln\monzo\Validator;

use shamiln\monzo\Validator\JsonSchemaValidator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Webmozart\Json\JsonValidator;

class JsonSchemaValidatorSpec extends ObjectBehavior
{
    public function let(
        \SplFileInfo $schemaPath,
        JsonValidator $validator
    )
    {
        $this->beConstructedWith($schemaPath, $validator);
    }
}
