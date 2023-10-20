<?php

namespace model\classes;

class Node
{
    private int $id;
    private double $x;
    private double $y;

    /**
     * @param int $id
     * @param float $x
     * @param float $y
     */
    public function __construct(int $id, float $x, float $y)
    {
        $this->id = $id;
        $this->x = $x;
        $this->y = $y;
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
    public function getX(): float
    {
        return $this->x;
    }

    /**
     * @param float $x
     */
    public function setX(float $x): void
    {
        $this->x = $x;
    }

    /**
     * @return float
     */
    public function getY(): float
    {
        return $this->y;
    }

    /**
     * @param float $y
     */
    public function setY(float $y): void
    {
        $this->y = $y;
    }




}