<?php

namespace DRWork\Core;

use DRWork\AbstractRepository;

class ORM extends AbstractRepository
{
  public function create($table, $fields)
  {
    $val1 = implode(", ", array_keys($fields));
    $val2 = "'" . implode("', '", $fields) . "'";
   
    $create = $this->pdo->prepare("INSERT INTO $table($val1) VALUES($val2)");
    $create->execute();
  }

  public function read($table, $id)
  {
    $read = $this->pdo->prepare("SELECT * FROM $table WHERE $id");

    $read->execute();
    return $read->fetch();
  }

  public function update($table, $id, $fields)
  {
    $fields_all = '';
    foreach ($fields as $key => $value) {
      if (!empty($value) && $key != 'id') {
        $fields_all .= $key . " = \"" . $value . "\",";
      }
    }
    $fields_all = substr($fields_all, 0, -1);
    
    $update = $this->pdo->prepare("UPDATE $table SET $fields_all WHERE id = $id");
    return $update->execute();
  }

  public function delete($table, $id)
  {
    $delete = $this->pdo->prepare("DELETE FROM $table WHERE id = $id");
    return $delete->execute();
  }

  public function find($table, $params = ['WHERE' => '', 'ORDER BY' => '', 'LIMIT' => '']){
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

    $find = $this->pdo->prepare("SELECT * FROM $table $params_all");
    $find->execute();
    return $find->fetchAll();
  }

}