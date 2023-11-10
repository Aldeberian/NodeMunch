<?php

namespace model\metier;

class Graph
{

    private int $id;
    private string $name;
    private User $creator;
    private Thumbnail $thumbnail;
    private array $nodes;

    /**
     * @param int $id ID of the Graph
     * @param string|null $name Name of the Graph (can be null)
     * @param User $creator User who created the Graph
     * @param Thumbnail|null $pictId ID of the image preview (can be null)
     * @param array $nodes List of nodes
     */
    public function __construct(int $id, ?string $name, User $creator, ?Thumbnail $thumbnail, array $nodes)
    {
        $this->setId($id);
        ($name == null) ? $this->setName($id) : $this->setName($name); // If there's no name in parameters, the name of the graph is set to the id
        $this->setCreator($creator);
        $this->setThumbnail($thumbnail);
        $this->setNodes($nodes);
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
     * @return string
     */
    public function getName(): string
    {
            return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        isset($name)? $this->name = $name : $this->name = strval($this->getId());
    }

    /**
     * @return User
     */
    public function getCreator(): User
    {
        return $this->creator;
    }

    /**
     * @param User $creator
     */
    public function setCreator(User $creator): void
    {
        $this->creator = $creator;
    }

    /**
     * @return Thumbnail
     */
    public function getThumbnail(): Thumbnail
    {
        return $this->thumbnail;
    }

    /**
     * @param Thumbnail $thumbnail
     */
    public function setThumbnail(Thumbnail $thumbnail): void
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return array
     */
    public function getNodes(): array
    {
        return $this->nodes;
    }

    /**
     * @param array $nodes
     */
    public function setNodes(array $nodes): void
    {
        $this->nodes = $nodes;
    }

    public function __toString(): string { 
        $nTab=array();
        foreach($this->getNodes() as $node){
            array_push($nTab, $node->getId());
        }
        return  "ID : ".strval($this->getId())."<br>".
                "Name : ".$this->getName()."<br>".
                "Creator : ".$this->getCreator()->getPseudo()."<br>".
                "Image preview ID : ".strval($this->getThumbnail()->getId())."<br>".
                "Nodes : ".implode($nTab,", ")."<br>";
    }
}