<?php
namespace shamiln\monzo\Validator;

use Webmozart\Json\JsonValidator;

class JsonSchemaValidator implements SchemaValidatorInterface
{
    /**
     * @var \SplFileInfo
     */
    private $schemaPath;

    /**
     * @var JsonValidator
     */
    private $validator;

    /**
     * JsonSchemaValidator constructor.
     * @param \SplFileInfo $schemaPath
     * @param JsonValidator $validator
     */
    public function __construct(\SplFileInfo $schemaPath, JsonValidator $validator)
    {
        $this->schemaPath = $schemaPath;
        $this->validator = $validator;
    }

    /**
     * {@inheritdoc}
     */
    public function isValid($payload): bool
    {
        return empty(
            $this->validator->validate(
                $payload,
                $this->schemaPath->getRealPath()
            )
        );
    }
}
