<?php

namespace Chowhwei\MuninPhpPlugin;

use ArrayObject;

class DataSourceSet extends ArrayObject
{
    public function getValues()
    {
        $output = [];

        foreach ($this as $datasource) {
            $output[] = $datasource->getName() . '.value ' . $datasource->getValue();
        }

        return implode(PHP_EOL, $output);
    }
}