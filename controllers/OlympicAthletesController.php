<?php
require_once "controllers/Controller.php";
require_once "models/Athlete.php";
require_once "models/Achievement.php";
require_once "models/Person.php";
require_once "models/OlympicGame.php";

class OlympicAthletesController extends Controller{
    public function getAthleteDetails($id){
        $athlete = $this->getAthletePersonalInfo($id);
        $athlete->setAchievements($this->getAthleteAchievements($id));
        return $athlete;
    }
    private function getAthletePersonalInfo($id){
        $statement = $this->mysqlDatabase->prepareStatement("SELECT OSOBY.id AS id, OSOBY.name AS name, OSOBY.surname AS surname, OSOBY.birth_day AS birthDay, OSOBY.birth_place AS birthPlace, OSOBY.birth_country AS birthCountry, OSOBY.death_day AS deathDay, OSOBY.death_place AS deathPlace, OSOBY.death_country AS deathCountry
                                                                    FROM OSOBY 
                                                                    WHERE OSOBY.id = :id");
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Athlete");
        return $statement->fetch();
    }
    private function getAthleteAchievements($id){
        $statement = $this->mysqlDatabase->prepareStatement("SELECT UMIESTNENIA.id AS id, UMIESTNENIA.placing AS placing, UMIESTNENIA.discipline AS discipline, OH.year AS year, OH.type AS type, OH.city AS city, OH.country AS country
                                                                    FROM UMIESTNENIA 
                                                                    INNER JOIN OH ON UMIESTNENIA.oh_id = OH.id
                                                                    WHERE UMIESTNENIA.person_id = :id
                                                                    ORDER BY placing");
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Achievement");
        return $statement->fetchAll();

    }
    public function deleteAthlete($id){
        $statement = $this->mysqlDatabase->prepareStatement("DELETE FROM OSOBY WHERE OSOBY.id = :id");
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowCount();
    }
    public function editAthlete($id, $name, $surname, $birthDay, $birthPlace, $birthCountry, $deathDay, $deathPlace, $deathCountry){
        $statement = $this->mysqlDatabase->prepareStatement("UPDATE OSOBY
                                                                    SET OSOBY.name = :name, OSOBY.surname = :surname, OSOBY.birth_day = :birthDay, OSOBY.birth_place = :birthPlace, OSOBY.birth_country = :birthCountry, OSOBY.death_day = :deathDay, OSOBY.death_place = :deathPlace, OSOBY.death_country = :deathCountry
                                                                    WHERE OSOBY.id = :id");
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->bindValue(':name', $name, PDO::PARAM_STR);
        $statement->bindValue(':surname', $surname, PDO::PARAM_STR);
        $statement->bindValue(':birthDay', $birthDay, PDO::PARAM_STR);
        $statement->bindValue(':birthPlace', $birthPlace, PDO::PARAM_STR);
        $statement->bindValue(':birthCountry', $birthCountry, PDO::PARAM_STR);
        $statement->bindValue(':deathDay', $deathDay, PDO::PARAM_STR);
        $statement->bindValue(':deathPlace', $deathPlace, PDO::PARAM_STR);
        $statement->bindValue(':deathCountry', $deathCountry, PDO::PARAM_STR);
        try{
            $statement->execute();
            return $statement->rowCount();
        }catch(PDOException $e) {
            return -1;
        }
    }
    public function deleteAchievement($id){
        $statement = $this->mysqlDatabase->prepareStatement("DELETE FROM UMIESTNENIA WHERE UMIESTNENIA.id = :id");
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowCount();
    }
    public function addAthlete($name, $surname, $birthDay, $birthPlace, $birthCountry, $deathDay, $deathPlace, $deathCountry){
        $statement = $this->mysqlDatabase->prepareStatement("INSERT INTO OSOBY (name, surname, birth_day, birth_place, birth_country, death_day, death_place, death_country)
                                                                    VALUES (:name, :surname, :birthDay, :birthPlace, :birthCountry, :deathDay, :deathPlace, :deathCountry)");
        $statement->bindValue(':name', $name, PDO::PARAM_STR);
        $statement->bindValue(':surname', $surname, PDO::PARAM_STR);
        $statement->bindValue(':birthDay', $birthDay, PDO::PARAM_STR);
        $statement->bindValue(':birthPlace', $birthPlace, PDO::PARAM_STR);
        $statement->bindValue(':birthCountry', $birthCountry, PDO::PARAM_STR);
        $statement->bindValue(':deathDay', $deathDay, PDO::PARAM_STR);
        $statement->bindValue(':deathPlace', $deathPlace, PDO::PARAM_STR);
        $statement->bindValue(':deathCountry', $deathCountry, PDO::PARAM_STR);
        try{
            $statement->execute();
        }catch(PDOException $e) {
            return -1;
        }
        return 1;
    }
    public function addAchievement($athleteId, $olympicsId, $placing, $discipline){
        $statement = $this->mysqlDatabase->prepareStatement("INSERT INTO UMIESTNENIA (person_id, oh_id, placing, discipline)
                                                                    VALUES (:athleteId, :olympicsId, :placing, :discipline)");
        $statement->bindValue(':athleteId', $athleteId, PDO::PARAM_INT);
        $statement->bindValue(':olympicsId', $olympicsId, PDO::PARAM_INT);
        $statement->bindValue(':placing', $placing, PDO::PARAM_INT);
        $statement->bindValue(':discipline', $discipline, PDO::PARAM_STR);
        try{
            $statement->execute();
        }catch(PDOException $e) {
            return 0;
        }
        return 1;
    }
    public function getAllAthletes(){
        $statement = $this->mysqlDatabase->prepareStatement("SELECT OSOBY.id AS id, OSOBY.name AS name, OSOBY.surname AS surname, OSOBY.birth_day AS birthDay, OSOBY.birth_place AS birthPlace, OSOBY.birth_country AS birthCountry, OSOBY.death_day AS deathDay, OSOBY.death_place AS deathPlace, OSOBY.death_country AS deathCountry
                                                                    FROM OSOBY");
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Athlete");
        return $statement->fetchAll();
    }
    public function getAllOlympics(){
        $statement = $this->mysqlDatabase->prepareStatement("SELECT OH.id AS id, OH.type AS type, OH.year AS year, OH.city AS city, OH.country AS country
                                                                    FROM OH");
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "OlympicGame");
        return $statement->fetchAll();
    }
}
