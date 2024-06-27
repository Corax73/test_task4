<?php

class Pear extends Tree
{
    public int $treeId;
    public string $treeBreed = 'Pear';
    public string $product = 'pear';

    /**
     * @construct
     */
    function __construct()
    {
        $this->treeId = parent::$id++;
    }

    /**
     * @return int
     */
    public function getOutputProduct(): int
    {
        return rand(0, 20);
    }

    /**
     * @return int
     */
    public function getFetalWeight(): int
    {
        return rand(130, 170);
    }
}
