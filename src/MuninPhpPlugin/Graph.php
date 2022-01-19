<?php

namespace Chowhwei\MuninPhpPlugin;

/**
 * Graph
 * @see http://munin-monitoring.org/wiki/protocol-config
 */
class Graph
{
    const FIELD_TYPE_GAUGE = 'GAUGE';
    const FIELD_TYPE_COUNTER = 'COUNTER';
    const FIELD_TYPE_DERIVE = 'DERIVE';
    const FIELD_TYPE_ABSOLUTE = 'ABSOLUTE';

    const FIELD_DRAW_LINE1 = 'LINE1';
    const FIELD_DRAW_LINE2 = 'LINE2';
    const FIELD_DRAW_LINE3 = 'LINE3';
    const FIELD_DRAW_AREA = 'AREA';
    const FIELD_DRAW_STACK = 'STACK';
    const FIELD_DRAW_LINESTACK1 = 'LINESTACK1';
    const FIELD_DRAW_LINESTACK2 = 'LINESTACK2';
    const FIELD_DRAW_LINESTACK3 = 'LINESTACK3';
    const FIELD_DRAW_AREASTACK = 'AREASTACK';

    protected $graph;
    protected $graph_args;
    protected $graph_category;
    protected $graph_height;
    protected $graph_info;
    protected $graph_order;
    protected $graph_period;
    protected $graph_printf;
    protected $graph_scale;
    protected $graph_title;
    protected $graph_total;
    protected $graph_vlabel;
    protected $graph_width;
    protected $host_name;
    protected $multigraph;
    protected $update;
    protected $update_rate;

    protected $fields;
    protected $filter = ['fields', 'filter'];

    public function __construct($graph_title, $graph_category = 'other')
    {
        $this->graph_title = $graph_title;
        $this->graph_category = $graph_category;
        $this->fields = new Fields();
    }

    public function getConfig()
    {
        $output = [$this->getGraphConfig()];

        /** @var Field $field */
        foreach ($this->fields as $field) {
            $output[] = $field->getConfig();
        }
        return implode(PHP_EOL, $output);
    }

    public function getValues()
    {
        return $this->fields->getValues();
    }

    public function appendField(Field $field)
    {
        $this->fields[$field->getName()] = $field;
        return $this;
    }

    /**
     * @param string $name
     * @return Field|null
     */
    public function getField($name){
        return isset($this->fields[$name]) ? $this->fields[$name] : null;
    }

    protected function getGraphConfig()
    {
        $output = [];
        $objectVars = array_filter(get_object_vars($this));

        foreach ($objectVars as $key => $value) {
            if(in_array($key, $this->filter)){
                continue;
            }
            $output[] = "{$key} {$value}";
        }
        return implode(PHP_EOL, $output);
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
     * @return Graph
     */
    public function setGraph($graph)
    {
        $this->graph = $graph;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGraphArgs()
    {
        return $this->graph_args;
    }

    /**
     * @param mixed $graph_args
     * @return Graph
     */
    public function setGraphArgs($graph_args)
    {
        $this->graph_args = $graph_args;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGraphCategory()
    {
        return $this->graph_category;
    }

    /**
     * @param mixed $graph_category
     * @return Graph
     */
    public function setGraphCategory($graph_category)
    {
        $this->graph_category = $graph_category;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGraphHeight()
    {
        return $this->graph_height;
    }

    /**
     * @param mixed $graph_height
     * @return Graph
     */
    public function setGraphHeight($graph_height)
    {
        $this->graph_height = $graph_height;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGraphInfo()
    {
        return $this->graph_info;
    }

    /**
     * @param mixed $graph_info
     * @return Graph
     */
    public function setGraphInfo($graph_info)
    {
        $this->graph_info = $graph_info;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGraphOrder()
    {
        return $this->graph_order;
    }

    /**
     * @param mixed $graph_order
     * @return Graph
     */
    public function setGraphOrder($graph_order)
    {
        $this->graph_order = $graph_order;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGraphPeriod()
    {
        return $this->graph_period;
    }

    /**
     * @param mixed $graph_period
     * @return Graph
     */
    public function setGraphPeriod($graph_period)
    {
        $this->graph_period = $graph_period;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGraphPrintf()
    {
        return $this->graph_printf;
    }

    /**
     * @param mixed $graph_printf
     * @return Graph
     */
    public function setGraphPrintf($graph_printf)
    {
        $this->graph_printf = $graph_printf;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGraphScale()
    {
        return $this->graph_scale;
    }

    /**
     * @param mixed $graph_scale
     * @return Graph
     */
    public function setGraphScale($graph_scale)
    {
        $this->graph_scale = $graph_scale;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGraphTitle()
    {
        return $this->graph_title;
    }

    /**
     * @param mixed $graph_title
     * @return Graph
     */
    public function setGraphTitle($graph_title)
    {
        $this->graph_title = $graph_title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGraphTotal()
    {
        return $this->graph_total;
    }

    /**
     * @param mixed $graph_total
     * @return Graph
     */
    public function setGraphTotal($graph_total)
    {
        $this->graph_total = $graph_total;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGraphVlabel()
    {
        return $this->graph_vlabel;
    }

    /**
     * @param mixed $graph_vlabel
     * @return Graph
     */
    public function setGraphVlabel($graph_vlabel)
    {
        $this->graph_vlabel = $graph_vlabel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGraphWidth()
    {
        return $this->graph_width;
    }

    /**
     * @param mixed $graph_width
     * @return Graph
     */
    public function setGraphWidth($graph_width)
    {
        $this->graph_width = $graph_width;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHostName()
    {
        return $this->host_name;
    }

    /**
     * @param mixed $host_name
     * @return Graph
     */
    public function setHostName($host_name)
    {
        $this->host_name = $host_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMultigraph()
    {
        return $this->multigraph;
    }

    /**
     * @param mixed $multigraph
     * @return Graph
     */
    public function setMultigraph($multigraph)
    {
        $this->multigraph = $multigraph;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdate()
    {
        return $this->update;
    }

    /**
     * @param mixed $update
     * @return Graph
     */
    public function setUpdate($update)
    {
        $this->update = $update;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdateRate()
    {
        return $this->update_rate;
    }

    /**
     * @param mixed $update_rate
     * @return Graph
     */
    public function setUpdateRate($update_rate)
    {
        $this->update_rate = $update_rate;
        return $this;
    }
}