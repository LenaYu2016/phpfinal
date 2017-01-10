<?php
namespace Project\Classes\DB;

use PDO;

/**
 * Class DB
 * Provide static methods which allow user to get instance of database
 * and perform some very basic sql actions.
 * @package Project\Classes\DB
 * @author Yi
 */
class DB {
  private static $_db;

  // Get instance of database
  public static function getDB() {
    if (!self::$_db) {
      try {
        self::$_db = new PDO('mysql:host=' . DbConfig::SERVER . ';dbname=' . DbConfig::DB_NAME, DbConfig::DB_USER, DbConfig::DB_PASS);
      } catch (\PDOException $e) {
        echo 'database error: ', $e->getMessage();
      }
    }
    return self::$_db;
  }

  /**
   * Bind values then perform insert action.
   *
   * @param string $tableAndColumns Table name
   * @param array $valuesArray Array of values to be inserted, key should be column name
   * @param array $typesArray Array contains pdo param types of each column
   * @return bool|string  Return true if insert success, error message if not
   */
  public static function insert($tableName, array $valuesArray, array $typesArray) {
    $columns = join(',', array_keys($valuesArray));
    // generate placeholders, like name = :name
    $valuesPlaceholder = join(',', array_map(function ($key) { return ":$key"; }, array_keys($valuesArray)));

    $insertStmt = self::getDB()->prepare("
      INSERT INTO $tableName ($columns)
      VALUES ($valuesPlaceholder);
    ");
    $insertStmt = self::bindValues($insertStmt, $valuesArray, $typesArray);
    return $insertStmt->execute() ? true : $insertStmt->errorInfo()[2];
  }

  /**
   * Simple select. NOTE: it only uses AND to connect each condition.
   *
   * @param string $tableName
   * @param array $valuesArray  Array of values in key value pair
   * @param array $typesArray   Array contains types of each column
   * @param string $condition   Sign will be used in where clause
   * @return array  Result of select or error information
   */
  public static function select($tableName, $valuesArray = [], $typesArray = [], $condition = '=') {
    $whereClause = '';
    if (!empty($valuesArray)) {
      $whereClause = 'WHERE ' . join(' AND ', array_map(function($key) use($condition) {
        return "$key $condition :$key";
      }, array_keys($valuesArray)));
    }
    $selectStmt = self::getDB()->prepare("
      SELECT * FROM $tableName $whereClause
    ");
    $selectStmt = !empty($whereClause) ? self::bindValues($selectStmt, $valuesArray, $typesArray) : $selectStmt;
    return $selectStmt->execute() ? $selectStmt->fetchAll(PDO::FETCH_ASSOC) : $selectStmt->errorInfo()[2];
  }

  public static function find($query, $params) {
    $stmt = self::getDB()->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Update.
   *
   * @param string $table Table name
   * @param array $update Array of values need to be updated
   * @param string $condition Condition after WHERE
   * @param array $conditionArray Array of values appear in the condition clause
   * @param array $typesArray Type of all values
   * @return bool|string  True if success, or error message
   */
  public static function update($table, array $update, $condition, array $conditionArray, array $typesArray) {
    $set = join(', ', array_map(function ($key) {
      return "$key=:$key";
    }, array_keys($update)));
    $updateStmt = self::getDB()->prepare("
      UPDATE $table
      SET $set
      WHERE $condition
    ");
    $updateStmt = self::bindValues($updateStmt, $update, $typesArray);
    $updateStmt = self::bindValues($updateStmt, $conditionArray, $typesArray);
    return $updateStmt->execute() ? true : $updateStmt->errorInfo()[2];
  }

  /**
   * @param string $table
   * @param array $conditionArray
   * @param array $typesArray
   * @param string $condition
   * @return bool|string
   */
  public static function delete($table, array $conditionArray, array $typesArray, $condition = '=') {
    $deleteCondition = join($condition, array_map(function($key) {
      return "$key = :$key";
    }, array_keys($conditionArray)));
    $deleteStmt = self::getDB()->prepare("
      DELETE FROM $table
      WHERE $deleteCondition
    ");
    $deleteStmt = self::bindValues($deleteStmt, $conditionArray, $typesArray);
    return $deleteStmt->execute() ? true : $deleteStmt->errorInfo()[2];
  }

  /**
   * Bind values to a statement
   *
   * @param \PDOStatement $stmt Statement need to bind values
   * @param array $valuesArray  Key value pairs of value, key is name in sql query.
   * @param array $typesArray   PDO param type of each value
   * @return \PDOStatement
   */
  public static function bindValues(\PDOStatement $stmt, array $valuesArray, array $typesArray) {
    foreach ($valuesArray as $key => $value) {
      // add colon
      $key = !strpos($key, ':') ? $key : ':' . $key;
      $stmt->bindValue($key, $value, $typesArray[$key]);
    }
    return $stmt;
  }

}

