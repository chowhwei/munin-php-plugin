<?php

namespace Chowhwei\MuninPhpPlugin;

/**
 * Graph
 *
 * @see http://munin-monitoring.org/wiki/protocol-config
 *
 * @method $this setVLable(mixed $value)
 * @method string getVLabel()
 * @method $this setCategory(mixed $value)
 * @method string getCategory()
 */
class Graph extends Data
{
    protected $title;

    protected $_properties = [
        'title',
        'createArgs',
        'graphArgs',
        'category',
        'info',
        'order',
        'vlabel',
        'total',
        'scale',
        'graph',
        'host_name',
        'update',
        'period',
        'vtitle',
        'service_order',
        'width',
        'height',
        'printf'
    ];

    protected $dataSourceSet;

    public function __construct($title)
    {
        $this->title = $title;
        $this->dataSourceSet = new DataSourceSet();
    }

    public function getConfig()
    {
        $output = [$this->getGraphConfig()];

        /** @var DataSource $dataSource */
        foreach ($this->dataSourceSet as $dataSource) {
            $output[] = $dataSource->getConfig();
        }

        return implode(PHP_EOL, $output);
    }

    protected function getGraphConfig()
    {
        $output = [];
        $objectVars = $this->getObjectVarsNotNull();

        foreach ($objectVars as $key => $value) {

            $output[] = 'graph_' . $key . ' ' . $value;

        }

        return implode(PHP_EOL, $output);
    }

    public function getDataSourceSet()
    {
        return $this->dataSourceSet;
    }

    public function setDataSourceSet(DataSourceSet $dataSourceSet)
    {
        $this->dataSourceSet = $dataSourceSet;
        return $this;
    }
}