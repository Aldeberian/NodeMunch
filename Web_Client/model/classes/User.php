<?php

namespace model\classes;

class User
{
    private int $id;

    private string $pseudo;

    private string $password;

    private string $email;

    private array $myGraphs;

    private array $favGraphs;

    private bool $ban;

    private array $friends;

    /**
     * @param int $id
     * @param string $pseudo
     * @param string $password
     * @param string $email
     * @param array $myGraphs
     * @param array $favGraphs
     * @param bool $ban
     * @param array $friends
     */
    public function __construct(int $id, string $pseudo, string $password, string $email, array $myGraphs, array $favGraphs, int $isBan, array $friends)
    {
        $this->setId($id);
        $this->setPseudo($pseudo);
        $this->setPassword($password);
        $this->setEmail($email);
        $this->setMyGraphs($myGraphs);
        $this->setFavGraphs($favGraphs);
        $this->setBanInt($isBan); //have modified to an int because in the database it's preferred to use int to stock the state of isBan
        $this->setFriends($friends);
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
     * @return array
     */
    public function getMyGraphs(): array
    {
        return $this->myGraphs;
    }

    /**
     * @param array $myGraphs
     */
    public function setMyGraphs(array $myGraphs): void
    {
        $this->myGraphs = $myGraphs;
    }

    /**
     * @return array
     */
    public function getFavGraphs(): array
    {
        return $this->favGraphs;
    }

    /**
     * @param array $favGraphs
     */
    public function setFavGraphs(array $favGraphs): void
    {
        $this->favGraphs = $favGraphs;
    }

    /**
     * @return bool
     */
    public function isBan(): bool
    {
        return $this->ban;
    }

    /**
     * @param int $ban
     */
    public function setBanInt(int $ban): void
    {
        if($ban == 0){
            $ban = false;
        }else{
            $ban = true;
        }
    }

    /**
     * @param bool $ban
     */
    public function setBan(bool $isBan): void
    {
        $this->isBan = $isBan;
    }

    /**
     * @return array
     */
    public function getFriends(): array
    {
        return $this->friends;
    }

    /**
     * @param array $friends
     */
    public function setFriends(array $friends): void
    {
        $this->friends = $friends;
    }

    public function __toString(): string
    {
        return "ID : ".strval($this->getId())."<br>".
               "User : ".$this->getPseudo()."<br>".
               "E-Mail : ".$this->getEmail()."<br>".
               "Banned : ".strval($this->isBan())."<br>";
    }
}