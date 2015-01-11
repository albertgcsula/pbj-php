<?php

namespace Gdbots\Messages\Type;

use Gdbots\Common\Enum;
use Gdbots\Messages\Assertion;
use Gdbots\Messages\Field;

final class IntEnum extends AbstractType
{
    /**
     * @see Type::guard
     */
    public function guard($value, Field $field)
    {
        /** @var Enum $value */
        Assertion::isInstanceOf($value, $field->getClassName(), null, $field->getName());
        Assertion::integer($value->getValue(), null, $field->getName());
        Assertion::range($value->getValue(), 0, 4294967295, null, $field->getName());
    }

    /**
     * @see Type::encode
     */
    public function encode($value, Field $field)
    {
        if ($value instanceof Enum) {
            return (int) $value->getValue();
        }
        return 0;
    }

    /**
     * @see Type::decode
     */
    public function decode($value, Field $field)
    {
        /** @var Enum $className */
        $className = $field->getClassName();
        if (null === $value) {
            return $field->getDefault();
        }
        return $className::create((int) $value);
    }

    /**
     * @see Type::isNumeric
     */
    public function isNumeric()
    {
        return true;
    }
}