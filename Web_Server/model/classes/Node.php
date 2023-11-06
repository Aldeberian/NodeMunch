<?php

namespace model\classes;

class Node
{
    private int $id;
    private float $posX;
    private float $posY;
    private array $neighbours;

    /**
     * @param int $id
     * @param float $posX
     * @param float $posY
     * @param array $neighbours
     */
    public function __construct(int $id, float $posX, float $posY, array $neighbours)
    {
        $this->setId($id);
        $this->setPosX($posX);
        $this->setPosY($posY);
        $this->setNeighbours($neighbours);
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
     * @return float
     */
    public function getPosX(): float
    {
        return $this->posX;
    }

    /**
     * @param float $posX
     */
    public function setPosX(float $posX): void
    {
        $this->posX = $posX;
    }

    /**
     * @return float
     */
    public function getPosY(): float
    {
        return $this->posY;
    }

    /**
     * @param float $posY
     */
    public function setPosY(float $posY): void
    {
        $this->posY = $posY;
    }

    /**
     * @return array
     */
    public function getNeighbours(): array
    {
        return $this->neighbours;
    }

    /**
     * @param array $neighbours
     */
    public function setNeighbours(array $neighbours): void
    {
        $this->neighbours = $neighbours;
    }

    public function __toString(): string { 
        return  "ID : ".strval($this->getId())."<br>".
                "Coordinates : (".strval($this->getPosX()).", ".
                strval($this->getPosY()).").<br>".
                "Neighbours : ".implode(", ",$this->getNeighbours())."<br>";
    }

}