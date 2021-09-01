<?php
require_once "models/Person.php";
require_once "models/Achievement.php";

class Athlete extends Person{
    private string $birthDay;
    private string $birthPlace;
    private string $birthCountry;
    private ?string $deathDay;
    private ?string $deathPlace;
    private ?string $deathCountry;
    private array $achievements;

    public function getFullName(): string{
        return "".$this->name." ".$this->surname;
    }
    public function getPersonalInfo(): string{
        return "<ul>
                <li id='star-li'>$this->birthDay, $this->birthPlace, $this->birthCountry</li>".
                (($this->deathDay || $this->deathPlace || $this->deathCountry) ? "<li id='cross-li'>$this->deathDay, $this->deathPlace, $this->deathCountry</li>":"")
            ."</ul>";
    }
    public function getAthleteOption(): string{
        return "<option id='lifeFrom$this->birthDay-To$this->deathDay' value='$this->id'>$this->name $this->surname ($this->birthDay, $this->birthPlace $this->birthCountry - $this->deathDay, $this->deathPlace $this->deathCountry)</option>";
    }
    /**
     * @return string
     */
    public function getBirthDay(): string{
        return $this->birthDay;
    }
    /**
     * @param string $birthDay
     */
    public function setBirthDay(string $birthDay): void{
        $this->birthDay = $birthDay;
    }
    /**
     * @return string
     */
    public function getBirthPlace(): string{
        return $this->birthPlace;
    }
    /**
     * @param string $birthPlace
     */
    public function setBirthPlace(string $birthPlace): void{
        $this->birthPlace = $birthPlace;
    }
    /**
     * @return string
     */
    public function getBirthCountry(): string{
        return $this->birthCountry;
    }
    /**
     * @param string $birthCountry
     */
    public function setBirthCountry(string $birthCountry): void{
        $this->birthCountry = $birthCountry;
    }
    /**
     * @return string|null
     */
    public function getDeathDay(): ?string{
        return $this->deathDay;
    }
    /**
     * @param string|null $deathDay
     */
    public function setDeathDay(?string $deathDay): void{
        $this->deathDay = $deathDay;
    }
    /**
     * @return string|null
     */
    public function getDeathPlace(): ?string{
        return $this->deathPlace;
    }
    /**
     * @param string|null $deathPlace
     */
    public function setDeathPlace(?string $deathPlace): void{
        $this->deathPlace = $deathPlace;
    }
    /**
     * @return string|null
     */
    public function getDeathCountry(): ?string{
        return $this->deathCountry;
    }
    /**
     * @param string|null $deathCountry
     */
    public function setDeathCountry(?string $deathCountry): void{
        $this->deathCountry = $deathCountry;
    }
    /**
     * @return array
     */
    public function getAchievements(): array{
        return $this->achievements;
    }
    /**
     * @param array $achievements
     */
    public function setAchievements(array $achievements): void{
        $this->achievements = $achievements;
    }
}
