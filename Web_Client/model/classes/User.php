<?php

namespace model;

class User
{
    private int $id;

    private string $pseudo;

    private string $password;

    private string $email;

    private int $myGraphs;

    private int $favGraphs;

    private bool $isBan;

    /**
     * @param int $id
     * @param string $pseudo
     * @param string $password
     * @param string $email
     * @param int $myGraphs
     * @param int $favGraphs
     */
    public function __construct(int $id, string $pseudo, string $password, string $email, int $myGraphs, int $favGraphs)
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->email = $email;
        $this->myGraphs = $myGraphs;
        $this->favGraphs = $favGraphs;
        $this->isBan = false;
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
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getMyGraphs(): int
    {
        return $this->myGraphs;
    }

    /**
     * @param int $myGraphs
     */
    public function setMyGraphs(int $myGraphs): void
    {
        $this->myGraphs = $myGraphs;
    }

    /**
     * @return int
     */
    public function getFavGraphs(): int
    {
        return $this->favGraphs;
    }

    /**
     * @param int $favGraphs
     */
    public function setFavGraphs(int $favGraphs): void
    {
        $this->favGraphs = $favGraphs;
    }

    /**
     * @return bool
     */
    public function isBan(): bool
    {
        return $this->isBan;
    }

    /**
     * @param bool $isBan
     */
    public function setIsBan(bool $isBan): void
    {
        $this->isBan = $isBan;
    }

}