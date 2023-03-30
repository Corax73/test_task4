<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

class Autoharvester
{

    public array $trees;

    public array $productionPerWeek = [];
    
    /**
     * @param string $nameClassTree
     * @param int $number
     */
    public function addTree(string $nameClassTree, int $number) : void
    {
        for ($i = 0; $i < $number; $i++){

            $typeTree = $this -> createTree($nameClassTree) -> treeBreed;
                
                if (!isset($this -> trees[$typeTree])) {
                    
                    $this -> trees[$typeTree] = [];

                    $this -> trees[$typeTree][] = $this -> createTree($nameClassTree);
                    
                } else {
                    
                    $this -> trees[$typeTree][] = $this -> createTree($nameClassTree);
                    
                }
            }
    }

    /**
     * @param string $nameClassTree
     * @return object|void
     */
    public function createTree(string $nameClassTree) : object
    {
        if (class_exists($nameClassTree)) {

            return new $nameClassTree;
        }
    }

    /**
     * @return void
     */
    public function getProduction() : void
    {
        $this -> productionPerWeek = [];

        for ($i = 0; $i <= 6; $i++){

            foreach ($this -> trees as $typeTree) {

                foreach ($typeTree as $tree) {

                    $typeProduct = $tree -> product;

                    if (!isset($this -> productionPerWeek[$typeProduct])) {

                        $this -> productionPerWeek[$typeProduct] = 0;

                        $this -> productionPerWeek[$typeProduct] += $tree -> getOutputProduct();

                    } else {

                        $this -> productionPerWeek[$typeProduct] += $tree -> getOutputProduct();

                    }
                }
            }
		}

		$typeProduct = array_keys($this -> productionPerWeek);

		foreach ($typeProduct as $product) {

			print $product . ' collected ' . $this -> productionPerWeek[$product] . "\n";

		}
	}

    /**
     * @return void
     */
    public function getCountTrees() : void
    {
        $typeTrees = array_keys($this -> trees);
        
        foreach ($typeTrees as $typeTree) {

            $count = count($this -> trees[$typeTree]);

            print 'Count ' . $this -> trees[$typeTree][0] -> treeBreed . ' ' . $count . "\n";

        }
    }

    /**
     * @return int
     */
    public function getWeightProduct() : void
    {

        $typeProduct = array_keys($this -> productionPerWeek);

		foreach ($typeProduct as $product) {

			$weight = [];

            for ($i = 0; $i < $this -> productionPerWeek[$product]; $i++) {

                $pear = new Pear;
                $appleTree = new AppleTree;

                if ($product == $pear -> product) {

                    if (!isset($weight[$product])) {
                        
                        $weight[$product] = 0;
                        
                        $weight[$product] += $pear -> getFetalWeight();
                    
                    } else {

                        $weight[$product] += $pear -> getFetalWeight();

                    }

                } elseif ($product == $appleTree -> product) {

                    if (!isset($weight[$product])) {
                        
                        $weight[$product] = 0;
                        $weight[$product] += $appleTree -> getFetalWeight();
                    
                    } else {

                        $weight[$product] += $appleTree -> getFetalWeight();

                    }
                    
                }

            }

            print 'Weight ' . $product . ' ' . $weight[$product] . "\n";

		}

    }
    
}
