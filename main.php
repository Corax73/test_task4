<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$numberAppleTree = 10;
$numberPear = 15;

$autoharvester = New Autoharvester();

$autoharvester -> addTree('AppleTree', $numberAppleTree);
$autoharvester -> addTree('Pear', $numberPear);

$autoharvester -> getProduction();

$autoharvester -> getCountTrees();

$autoharvester -> getWeightProduct();

