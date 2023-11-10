<?php

namespace model\metier;

class Edge
{
    private Node $node1;

    private Node $node2;

    private int $identifier;

    /**
     * @param Node $node1
     * @param Node $node2
     * @param int $identifier
     */

    public function __construct(Node $node1, Node $node2, int $identifier)
    {
        $this->setNode1($node1);
        $this->setNode2($node2);
        $this->setIdentifier($identifier);
    }


    /**
     * @return Node
     */
    public function getNode1(): Node
    {
        return $this->node1;
    }

    /**
     * @param Node $node1
     */
    public function setNode1(Node $node1): void
    {
        $this->node1 = $node1;
    }

    /**
     * @return Node
     */
    public function getNode2(): Node
    {
        return $this->node2;
    }

    /**
     * @param Node $node2
     */
    public function setNode2(Node $node2): void
    {
        $this->node2 = $node2;
    }

    /**
     * @return int
     */
    public function getIdentifier(): int
    {
        return $this->identifier;
    }

    /**
     * @param int $identifier
     */
    public function setIdentifier(int $identifier): void
    {
        $this->identifier = $identifier;
    }

    public function __toString() :string
    {
        return "Identifier : ".strval($this->getIdentifier())."<br>".
               "Node 1 : ".strval($this->getNode1()->getId())."<br>".
               "Node 2 : ".strval($this->getNode2()->getId())."<br>";
    }

}