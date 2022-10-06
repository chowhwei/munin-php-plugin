<?php

namespace Chowhwei\MuninPhpPlugin;

/**
 * Field
 * @see http://munin-monitoring.org/wiki/protocol-config
 * @see http://guide.munin-monitoring.org/en/latest/reference/plugin.html#data-source-attributes
 */
class Field
{
    protected $name;
    protected $cdef;
    protected $colour;
    protected $critical;
    protected $draw;
    protected $extinfo;
    protected $graph;
    protected $info;
    protected $label;
    protected $line;
    protected $max;
    protected $min;
    protected $negative;
    protected $stack;
    protected $sum;
    protected $type;
    protected $unknown_limit;
    protected $warning;
    protected $value;

    protected $filter = ['name', 'value', 'filter'];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getConfig($max_hz_count)
    {
        $output = [];
        $objectVars = get_object_vars($this);
        foreach ($objectVars as $key => $value) {
            if (in_array($key, $this->filter)) {
                continue;
            }
            if (is_null($value)) {
                continue;
            }

            if($key == 'label'){
                $hz_count = mb_strwidth($value) - mb_strlen($value);
                if($hz_count < $max_hz_count){
                    $value .= str_repeat('　', $max_hz_count - $hz_count);
                }
            }

            $output[] = $this->getName() . '.' . $key . ' ' . $value;
        }

        return implode(PHP_EOL, $output);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Field
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCdef()
    {
        return $this->cdef;
    }

    /**
     * @param mixed $cdef
     * @return Field
     */
    public function setCdef($cdef)
    {
        $this->cdef = $cdef;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getColour()
    {
        return $this->colour;
    }

    /**
     * @param mixed $colour
     * @return Field
     */
    public function setColour($colour)
    {
        $this->colour = $colour;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCritical()
    {
        return $this->critical;
    }

    /**
     * @param mixed $critical
     * @return Field
     */
    public function setCritical($critical)
    {
        $this->critical = $critical;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDraw()
    {
        return $this->draw;
    }

    /**
     * @param mixed $draw
     * @return Field
     */
    public function setDraw($draw)
    {
        $this->draw = $draw;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExtinfo()
    {
        return $this->extinfo;
    }

    /**
     * @param mixed $extinfo
     * @return Field
     */
    public function setExtinfo($extinfo)
    {
        $this->extinfo = $extinfo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGraph()
    {
        return $this->graph;
    }

    /**
     * @param mixed $graph
     * @return Field
     */
    public function setGraph($graph)
    {
        $this->graph = $graph;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param mixed $info
     * @return Field
     */
    public function setInfo($info)
    {
        $this->info = $info;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     * @return Field
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * @param mixed $line
     * @return Field
     */
    public function setLine($line)
    {
        $this->line = $line;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @param mixed $max
     * @return Field
     */
    public function setMax($max)
    {
        $this->max = $max;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @param mixed $min
     * @return Field
     */
    public function setMin($min)
    {
        $this->min = $min;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNegative()
    {
        return $this->negative;
    }

    /**
     * @param mixed $negative
     * @return Field
     */
    public function setNegative($negative)
    {
        $this->negative = $negative;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStack()
    {
        return $this->stack;
    }

    /**
     * @param mixed $stack
     * @return Field
     */
    public function setStack($stack)
    {
        $this->stack = $stack;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @param mixed $sum
     * @return Field
     */
    public function setSum($sum)
    {
        $this->sum = $sum;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return Field
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUnknownLimit()
    {
        return $this->unknown_limit;
    }

    /**
     * @param mixed $unknown_limit
     * @return Field
     */
    public function setUnknownLimit($unknown_limit)
    {
        $this->unknown_limit = $unknown_limit;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWarning()
    {
        return $this->warning;
    }

    /**
     * @param mixed $warning
     * @return Field
     */
    public function setWarning($warning)
    {
        $this->warning = $warning;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return Field
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}