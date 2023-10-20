<?php

namespace graph;

class Graph
{

    private int $id;
    private string $name;

    /**
     * @param int $id
     * @param ?string $name
     */
    public function __construct(int $id, ?string $name)
    {
        $this->id = $id;
        if($name == null){
            print("NULL");
            $this->name = $id;
        }else{
            print("NOT NULL");
        }
        $this->name = $name;
    }

    public function __toString(): string { return "Id : $this->id"."<br>"."Name : $this->name"."<br>"; }
}