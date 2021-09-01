<?php


class Achievement{
    private int $id;
    private int $placing;
    private string $discipline;
    private int $year;
    private string $type;
    private string $city;
    private string $country;

    public function getAchievement(): string{
        return "<li><strong>$this->placing. miesto</strong> v disciplíne <strong>$this->discipline</strong> v roku <strong>$this->year</strong> na $this->type $this->city, $this->country</li>";
    }
    public function getAchievementSelect(): string{
        return "<div class='form-check'>
              <input class='form-check-input' type='radio' value='$this->id' id='achievement$this->id' name='achievement'>
              <label class='form-check-label' for='achievement$this->id'><strong>$this->placing. miesto</strong> v disciplíne <strong>$this->discipline</strong> v roku <strong>$this->year</strong> na $this->type $this->city, $this->country</label>
              </div>";
    }
    /**
     * @return int
     */
    public function getId(): int{
        return $this->id;
    }
    /**
     * @param int $id
     */
    public function setId(int $id): void{
        $this->id = $id;
    }
    /**
     * @return int
     */
    public function getPlacing(): int{
        return $this->placing;
    }
    /**
     * @param int $placing
     */
    public function setPlacing(int $placing): void{
        $this->placing = $placing;
    }
    /**
     * @return string
     */
    public function getDiscipline(): string{
        return $this->discipline;
    }
    /**
     * @param string $discipline
     */
    public function setDiscipline(string $discipline): void{
        $this->discipline = $discipline;
    }
    /**
     * @return int
     */
    public function getYear(): int{
        return $this->year;
    }
    /**
     * @param int $year
     */
    public function setYear(int $year): void{
        $this->year = $year;
    }
    /**
     * @return string
     */
    public function getType(): string{
        return $this->type;
    }
    /**
     * @param string $type
     */
    public function setType(string $type): void{
        $this->type = $type;
    }
    /**
     * @return string
     */
    public function getCity(): string{
        return $this->city;
    }
    /**
     * @param string $city
     */
    public function setCity(string $city): void{
        $this->city = $city;
    }
    /**
     * @return string
     */
    public function getCountry(): string{
        return $this->country;
    }
    /**
     * @param string $country
     */
    public function setCountry(string $country): void{
        $this->country = $country;
    }
}
