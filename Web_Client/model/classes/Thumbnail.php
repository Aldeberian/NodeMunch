<?php

namespace model\classes;

class Thumbnail
{
    private int $id;
    private int $size;
    private string $thumbnail;

    /**
     * @param int $id
     * @param int $size
     * @param string $thumbnail
     */
    public function __construct(int $id, int $size, string $thumbnail)
    {
        $this->setId($id);
        $this->setSize($size);
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
     * @param float $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function getThumbnail(): string
    {
        return $this->thumbnail;
    }

    /**
     * @param string $thumbnail
     */
    public function setThumbnail(string $thumbnail): void
    {
        $this->thumbnail = $thumbnail;
    }

    public function __toString(): string
    {
        return "Id : ".strval($this->getId())."<br>".
               "Size : ".strval($this->getSize())."<br>";
    }
}