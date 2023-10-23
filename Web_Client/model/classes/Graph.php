<?php

namespace model\classes;

class Graph
{

    private int $id;
    private string $name;
    private string $creator;
    private int $pictId;

    /**
     * @param int $id ID of the Graph
     * @param string|null $name Name of the Graph (can be null)
     * @param int|null $pictId ID of the image preview (can be null)
     */
    public function __construct(int $id, ?string $name, ?int $pictId)
    {
        $this->setId($id);
        ($name == null) ? $this->name = $id : $this->name = $name; // If there's no name in parameters, the name of the graph is set to the id
        $this->pictId = $pictId;
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
     * @return int
     */
    public function getPictId(): int
    {
        return $this->pictId;
    }

    /**
     * @param int $pictId
     */
    public function setPictId(int $pictId): void
    {
        $this->pictId = $pictId;
    }

    public function __toString(): string { 
        return  "ID : ".strval($this->getId())."<br>".
                "Name : ".$this->getName()."<br>".
                "Creator : ".$this->getCreator()->getName()."<br>".
                "Image preview ID : ".strval($this->getPictId())."<br>";
    }
}