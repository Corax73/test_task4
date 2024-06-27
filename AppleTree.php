<?php

class AppleTree extends Tree
{
    public int $treeId;
    public string $treeBreed = 'AppleTree';
    public string $product = 'apple';

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
        return rand(40, 50);
    }

    /**
     * @return int
     */
    public function getFetalWeight(): int
    {
        return rand(150, 180);
    }
}
