<?php
require_once "controllers/Controller.php";
require_once "models/Winner.php";
require_once "models/Top10Winner.php";

class OlympicWinnersController extends Controller
{
    public function getAllWinners(){
        $statement = $this->mysqlDatabase->prepareStatement("SELECT OSOBY.id AS id, OSOBY.name AS name, OSOBY.surname AS surname, OH.year AS year, OH.city AS place, OH.type AS type, UMIESTNENIA.discipline AS discipline
                                                                    FROM ((UMIESTNENIA
                                                                    INNER JOIN OSOBY ON UMIESTNENIA.person_id = OSOBY.id)
                                                                    INNER JOIN OH ON UMIESTNENIA.oh_id = OH.id)
                                                                    WHERE UMIESTNENIA.placing = 1");
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Winner");
        return $statement->fetchAll();
    }
    public function getTop10Winners(){
        $statement = $this->mysqlDatabase->prepareStatement("SELECT OSOBY.id AS id, OSOBY.name AS name, OSOBY.surname AS surname, OSOBY.birth_place AS birthPlace, COUNT(UMIESTNENIA.placing) AS goldMedal 
                                                                    FROM UMIESTNENIA 
                                                                    INNER JOIN OSOBY ON UMIESTNENIA.person_id = OSOBY.id 
                                                                    WHERE UMIESTNENIA.placing = 1 
                                                                    GROUP BY OSOBY.id, OSOBY.name 
                                                                    ORDER BY goldMedal DESC, OSOBY.name ASC
                                                                    LIMIT 10");
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Top10Winner");
        return $statement->fetchAll();
    }
}
