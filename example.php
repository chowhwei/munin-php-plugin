<?php

require_once 'autoload.php';

use Chowhwei\MuninPhpPlugin\Graph;
use Chowhwei\MuninPhpPlugin\Field;

$graph = (new Graph('MyGraph', 'My Category'))
    ->setGraphVlabel('My Vlabel');

$dataSource = (new Field('mydata'))
    ->setLabel('My Data')
    ->setValue('foo');


$graph->appendField($dataSource)
    ->appendFieldEx('mydata', 'my data2', 'foo2');

echo 'Config:'.PHP_EOL;
echo $graph->getConfig().PHP_EOL;
echo PHP_EOL;
echo 'Values:'.PHP_EOL;
echo $graph->getValues().PHP_EOL;
