<?php

namespace model\classes;

class Graph
{

    private int $id;
    private string $name;
    private User $creator;
    private Thumbnail $thumbnail;

    /**
     * @param int $id ID of the Graph
     * @param string|null $name Name of the Graph (can be null)
     * @param int|null $pictId ID of the image preview (can be null)
     */
    public function __construct(int $id, ?string $name, ?User $creator, ?Thumbnail $thumbnail)
    {
        $this->setId($id);
        ($name == null) ? $this->setName($id) : $this->setName($name); // If there's no name in parameters, the name of the graph is set to the id
        $this->setCreator($creator);
        $this->setThumbnail($thumbnail);
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

    public function __toString(): string { 
        return  "ID : ".strval($this->getId())."<br>".
                "Name : ".$this->getName()."<br>".
                "Creator : ".$this->getCreator()->getPseudo()."<br>".
                "Image preview ID : ".strval($this->getThumbnail()->getId())."<br>";
    }
}