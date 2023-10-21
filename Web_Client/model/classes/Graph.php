<?php

namespace model\classes;

class Graph
{

    private int $id;
    private string $name;
    private int $idImage;

    /**
     * @param int $id ID of the Graph
     * @param string|null $name Name of the Graph (can be null)
     * @param int|null $idImage ID of the image preview (can be null)
     */
    public function __construct(int $id, ?string $name, ?int $idImage)
    {
        $this->id = $id;
        ($name == null) ? $this->name = $id : $this->name = $name; // If there's no name in parameters, the name of the graph is set to the id
        $this->idImage = $idImage;
    }


    public function __toString(): string { 
        return  "ID : $this->id"."<br>".
                "Name : $this->name"."<br>".
                "Image preview ID : $this->idImage"."<br>";
    }
}