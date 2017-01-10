<?php

namespace Project\Menu;


use Project\Classes\DB\DB;

class Page {

  const types = [
    ':id' => \PDO::PARAM_INT,
    ':content' => \PDO::PARAM_STR,
    ':link' => \PDO::PARAM_STR,
    ':name' => \PDO::PARAM_STR
  ];

  public function add($content, $name, $link) {
    $stmt = DB::getDB()->prepare('
      INSERT INTO pages (content, name, link) VALUES (:content, :name, :link)
    ');
    self::bindValues($stmt, [':content' => $content, ':link' => $link, ':name' => $name]);
    return $stmt->execute() ?  true : false;
  }

  public function getLastId() {
    $stmt = DB::getDB()->prepare('SELECT LAST_INSERT_ID()');
    $stmt->execute();
    return $stmt->fetch()[0];
  }

  public function update($id, $content, $name, $link) {
    $stmt = DB::getDB()->prepare('
      UPDATE pages SET content = :content, link = :link, name = :name
      WHERE id = :id;
    ');
    self::bindValues($stmt,
        [':id' => $id, ':content' => $content, ':link' => $link, ':name' => $name]
    );

    return $stmt->execute() ? true : false;
  }

  public function get($id) {
    return DB::find('SELECT * FROM pages WHERE id = :id', [':id' => $id])[0];
  }

  public function getAll() {
    return DB::find('SELECT * FROM pages', null);
  }

  public function delete($id) {
    $stmt = DB::getDB()->prepare('DELETE FROM pages WHERE id = :id');
    self::bindValues($stmt, [':id' => $id]);
    return $stmt->execute() == 1 ? true : false;
  }

  private function bindValues(\PDOStatement $stmt, array $values) {
    foreach ($values as $key => $value) {
      $stmt->bindValue($key, $value, self::types[$key]);
    }
    return $stmt;
  }
}