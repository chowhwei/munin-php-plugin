<?php

namespace Chowhwei\MuninPhpPlugin;

/**
 * Datasource
 *
 * @see http://munin-monitoring.org/wiki/protocol-config
 *
 * @method $this setName(mixed $value)
 * @method string getName()
 * @method $this setLabel(mixed $value)
 * @method string getLabel()
 * @method $this setValue(mixed $value)
 * @method mixed getValue()
 */
class DataSource extends Data
{
    protected $_properties = [
        'label',
        'cdef',
        'draw',
        'graph',
        'info',
        'extinfo',
        'max',
        'min',
        'negative',
        'type',
        'warning',
        'critical',
        'colour',
        'sum',
        'stack',
        'line',
        'oldname',
        'value'
    ];

    public function __construct($name)
    {
        $this->setName($name);
    }

    public function getConfig()
    {
        $output = [];
        $objectVars = $this->getObjectVarsNotNull();

        foreach ($objectVars as $key => $value) {
            $output[] = $this->getName() . '.' . $key . ' ' . $value;
        }

        return implode(PHP_EOL, $output);
    }
}