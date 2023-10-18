<?php

namespace graph;

class Graph
{

    private int $id;

    private int $nodes;

    private int $links;



    /**
     * @param int $id
     * @param int $nodes
     * @param int $links
     */
    public function __construct(int $id, int $nodes, int $links)
    {
        $this->id = $id;
        $this->nodes = $nodes;
        $this->links = $links;
    }



    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getNodes(): int
    {
        return $this->nodes;
    }

    /**
     * @param int $nodes
     */
    public function setNodes(int $nodes): void
    {
        $this->nodes = $nodes;
    }

    /**
     * @return int
     */
    public function getLinks(): int
    {
        return $this->links;
    }

    /**
     * @param int $links
     */
    public function setLinks(int $links): void
    {
        $this->links = $links;
    }


    public function __toString(): string
    {
    return "Id : $this->id"."<br>"."Number of Nodes : $this->nodes"."<br>"."Number of links : $this->links";

    }


    /**
     * @param int $idNode Id of the node that is going to be deleted (in case of changing mind of the user)
     */
    public function deleteNode(int $idNode) : void {

    }

    /**
     * @param int $idNode Id of the node that will be created and inserted int the future graph.
     */
    public function createNode(int $idNode) : void {

    }



}