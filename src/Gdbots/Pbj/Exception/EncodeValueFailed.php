<?php

namespace Gdbots\Pbj\Exception;

use Gdbots\Common\Util\StringUtils;
use Gdbots\Pbj\Field;

class EncodeValueFailed extends \InvalidArgumentException implements GdbotsPbjException
{
    /** @var mixed */
    private $value;

    /** @var Field */
    private $field;

    /**
     * @param mixed $value
     * @param string Field $field
     * @param string $message
     */
    public function __construct($value, Field $field, $message = null)
    {
        $this->value = $value;
        $this->field = $field;
        $message = sprintf(
            'Failed to encode [%s] for field [%s].  Detail: %s',
            is_scalar($this->value) ? $this->value : StringUtils::varToString($this->value),
            $this->field->getName(),
            $message
        );
        parent::__construct($message);
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return Field
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @return string
     */
    public function getFieldName()
    {
        return $this->field->getName();
    }
}

