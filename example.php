<?php

require_once 'autoload.php';

use Chowhwei\MuninPhpPlugin\Graph;
use Chowhwei\MuninPhpPlugin\Datasource;

$graph = (new Graph('MyGraph'))
    ->setVLable('My Vlabel')
    ->setCategory('My Category');


$dataSource = (new Datasource('mydata'))
    ->setLabel('My Data')
    ->setValue('foo');
$dataSource2 = (new Datasource('mydata2'))
    ->setLabel('My Data 2')
    ->setValue(12345);


$graph->getDataSourceSet()->append($dataSource);
$graph->getDataSourceSet()->append($dataSource2);


echo 'Config:'.PHP_EOL;
echo $graph->getConfig().PHP_EOL;
echo PHP_EOL;
echo 'Values:'.PHP_EOL;
echo $graph->getDatasourceSet()->getValues().PHP_EOL;
