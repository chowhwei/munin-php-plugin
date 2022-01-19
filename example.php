<?php

require_once 'autoload.php';

use Chowhwei\MuninPhpPlugin\Graph;
use Chowhwei\MuninPhpPlugin\Field;

$graph = (new Graph('MyGraph', 'My Category'))
    ->setGraphVlabel('My Vlabel')
    ->setGraphArgs('--lower-limit 0');

$dataSource = (new Field('mydata'))
    ->setLabel('My Data')
    ->setValue(1234)
    ->setDraw(Graph::FIELD_DRAW_AREASTACK);

echo 'Config:'.PHP_EOL;
echo $graph->getConfig().PHP_EOL;
echo PHP_EOL;
echo 'Values:'.PHP_EOL;
echo $graph->getValues().PHP_EOL;
