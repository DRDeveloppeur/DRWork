<?php

namespace DRWork\Core;

use DRWork\Core\Database;

class ORM extends Database
{
  private $db;

  public function create($table, $fields)
  {
    $bdd = new Database;
    $this->db = $bdd->db();

    $val1 = implode(", ", array_keys($fields));
    $val2 = "'" . implode("', '", $fields) . "'";
    $create = $this->db->prepare("INSERT INTO $table($val1) VALUES($val2)");
    $create->execute();
  }

  public function read($table, $id)
  {
    $bdd = new Database;
    $this->db = $bdd->db();

    $read = $this->db->prepare("SELECT * FROM $table WHERE $id");
    $read->execute();
    return $read->fetch();
  }

  public function update($table, $id, $fields)
  {
    $bdd = new Database;
    $this->db = $bdd->db();

    $fields_all = '';
    foreach ($fields as $key => $value) {
      if (!empty($value) && $key != 'id') {
        $fields_all .= $key . " = \"" . $value . "\",";
      }
    }
    $fields_all = substr($fields_all, 0, -1);
    $update = $this->db->prepare("UPDATE $table SET $fields_all WHERE id = $id");
    return $update->execute();
  }

  public function delete($table, $id)
  {
    $bdd = new Database;
    $this->db = $bdd->db();

    $delete = $this->db->prepare("DELETE FROM $table WHERE id = $id");
    return $delete->execute();
  }

  public function find($table, $params = ['WHERE' => '', 'ORDER BY' => '', 'LIMIT' => '']){
    $bdd = new Database;
    $this->db = $bdd->db();

    $params_all = '';
    if (!empty($params) && is_array($params))
    {
      foreach ($params as $key => $value)
      {
        if (!empty($value))
        {
          $params_all .= $key . ' ' . $value . ' ';
        }
      }
    }
    $find = $this->db->prepare("SELECT * FROM $table $params_all");
    $find->execute();
    return $find->fetchAll();
  }

}