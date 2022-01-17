<?php

namespace Chowhwei\MuninPhpPlugin;

use ArrayObject;

class Fields extends ArrayObject
{
    public function getValues()
    {
        $output = [];

        /** @var Field $field */
        foreach ($this as $field) {
            $output[] = "{$field->getName()}.value {$field->getValue()}";
        }

        return implode(PHP_EOL, $output);
    }
}