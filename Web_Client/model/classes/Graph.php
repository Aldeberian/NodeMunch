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

        $this->idImage = $idImage;
        if($name == null){
            print("NULL");
            $this->name = $id;
        }else{
            print("NOT NULL");
        }
        $this->name = $name;
        ($idImage == null) ? print("Image id is null") : print("Image id is not null");
        $this->idImage = 10;
    }


    public function __toString(): string { return "ID : $this->id"."<br>"."Name : $this->name"."<br>"."Image preview ID : $this->idImage"."<br>"; }
}