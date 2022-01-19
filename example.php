<?php

require_once 'autoload.php';

use Chowhwei\MuninPhpPlugin\Graph;
use Chowhwei\MuninPhpPlugin\Field;

$graph = (new Graph('MyGraph', 'My Category'))
    ->setGraphVlabel('My Vlabel')
    ->setGraphArgs('--lower-limit 0');

$field = (new Field('mydata'))
    ->setLabel('My Data')
    ->setDraw(Graph::FIELD_DRAW_AREASTACK);

$graph->appendField($field);

$f = $graph->getField('mydata');
if(!is_null($f)){
    $f->setValue(2345);
}

echo 'Config:'.PHP_EOL;
echo $graph->getConfig().PHP_EOL;
echo PHP_EOL;
echo 'Values:'.PHP_EOL;
echo $graph->getValues().PHP_EOL;
