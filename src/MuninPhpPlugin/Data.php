<?php

namespace Chowhwei\MuninPhpPlugin;

use Exception;

abstract class Data
{
    protected $_properties = [];
    protected $_values = [];

    /**
     * @throws Exception
     */
    public function __call($name, $arguments)
    {
        $var_name = strtolower(substr($name, 3));

        if (strpos($name, 'get') === 0) {
            return isset($this->_values[$var_name]) ? $this->_values[$var_name] : null;
        } elseif (strpos($name, 'set') === 0) {
            $this->_values[$var_name] = $arguments[0];
            return $this;
        } else {
            throw new Exception('Unknown method ' . $name, 1);
        }
    }

    protected function getObjectVarsNotNull()
    {
        return array_filter($this->_values);
    }
}