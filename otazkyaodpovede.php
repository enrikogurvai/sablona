<?php
namespace qna;

error_reporting(E_ALL); 
ini_set("display_errors", "On");

use databaza\Database;
use PDOException;

require_once('database.php');

class OtazkyAOdpovede extends Database {

    public function __construct() {
        parent::__construct();
    }

    public function getOtazkyAOdpovede() {
        try {
            $query = "SELECT otazka, odpoved FROM qna";
            $stmt = $this->getConnection()->prepare($query);
            $stmt->execute();
            
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            // Kombinácia try-catch bloku s vaším nastavením chýb
            die("Chyba pri načítaní dát: " . $e->getMessage());
        }
    }
}