<?php

abstract class Tree
{
    
    static int $id = 0;
    
    public int $animalId; 
    
    /**
     * @return int
     */
    public abstract function getOutputProduct();

    /**
     * @return int
     */
    public abstract function getFetalWeight();

}
