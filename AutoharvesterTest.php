<?php

use PHPUnit\Framework\TestCase;

require 'Autoharvester.php';
 
class AutoharvesterTest extends TestCase
{

    private $harvester;
 
    protected function setUp(): void
    {

        $this -> harvester = new Autoharvester();

    }
 
    protected function tearDown(): void
    {

        $this -> harvester = NULL;

    }
 
    public function testAddTree(): void
    {

        $number = 10000;
        $typeTree = 'AppleTree';
        
        $this -> harvester -> addTree($typeTree, $number);

        $this -> expectOutputString('Count AppleTree 10000' . "\n");

        $this -> harvester -> getCountTrees();

    }

    
    public function testGetProductionCount(): void
    {

        $number = 10000;
        $typeTree = 'AppleTree';
        
        $this -> harvester -> addTree($typeTree, $number);
        $this -> harvester -> getProduction();

        foreach ($this -> harvester -> trees as $typeTree) {
            
            foreach ($typeTree as $tree) {

                $typeProduct = $tree -> product;
            }

        }

        $this -> assertLessThan($this -> harvester -> productionPerWeek[$typeProduct], 1500);

    }

    public function testGetProductionString(): void
    {

        $number = 10000;
        $typeTree = 'AppleTree';
        
        $this -> harvester -> addTree($typeTree, $number);
        
        $this -> expectOutputString('apple collected ');

        $this -> harvester -> getProduction();

    }

    public function testGetWeightProductCount(): void
    {

        $number = 10000;
        $typeTree = 'AppleTree';
        
        $this -> harvester -> addTree($typeTree, $number);
        $this -> harvester -> getProduction();
        $this -> harvester -> getWeightProduct();

        foreach ($this -> harvester -> trees as $typeTree) {
            
            foreach ($typeTree as $tree) {

                $typeProduct = $tree -> product;
            }

        }

        $this -> assertLessThan($this -> harvester -> productionPerWeek[$typeProduct], 1500);

    }

}