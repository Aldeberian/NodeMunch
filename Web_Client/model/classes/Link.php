<?php

namespace model;

class Link
{

    public function __construct(int $node1, int $node2)
    {
        $this->node1 = $node1;
        $this->node2 = $node2;
    }


    /**
     * @return int
     */
    public function getNode1(): int
    {
        return $this->node1;
    }

    /**
     * @param int $node1
     */
    public function setNode1(int $node1): void
    {
        $this->node1 = $node1;
    }

    /**
     * @return int
     */
    public function getNode2(): int
    {
        return $this->node2;
    }

    /**
     * @param int $node2
     */
    public function setNode2(int $node2): void
    {
        $this->node2 = $node2;
    }
    private int $node1;

    private int $node2;

    /**
     * @param int $node1
     * @param int $node2
     */


    public function __toString() :string
    {
        return " Node 1 $this->node1 linked to $this->node2";
    }

}