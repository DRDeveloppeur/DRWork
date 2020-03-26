<?php

namespace App\Entity;

use DRWork\Core\ORM;

class Test extends ORM
{
    private $name;
    private $age;
    private $table;
    private $orm;

    public function __construct()
    {
        $this->table = "comment";
        // $this->orm = new ORM;
        // $this->orm = $this->orm->find("comment");
        // $find = $this->db->query("SHOW TABLES");
        // var_dump($find);
        // $this->name = 'toto';
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): string
    {
        return $this->age;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setAge(string $age)
    {
        $this->age = $age;
    }

    public function new($name, $comment)
    {
        $this->create($this->table, ["name" => $name, "comment" => $comment]);
    }

    public function findAll()
    {
        return $this->findAlls($this->table);
    }
}