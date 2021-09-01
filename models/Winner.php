<?php

use JetBrains\PhpStorm\Pure;

require_once "models/Person.php";
require_once "interfaces/HtmlTableRow.php";

class Winner extends Person implements HtmlTableRow {
    private int $year;
    private string $place;
    private string $type;
    private string $discipline;

    #[Pure] public function getHtmlTableRow(): string{
        return "<tr>
                    <td class='click-person' onmouseover='hoverNameOver(this)' onmouseout='hoverNameOut(this)' onclick=\"window.location='details.php?id=$this->id'\">".$this->getName()."</td>
                    <td class='click-person' onmouseover='hoverNameOver(this)' onmouseout='hoverNameOut(this)' onclick=\"window.location='details.php?id=$this->id'\">".$this->getSurname()."</td>
                    <td>".$this->getYear()."</td>
                    <td>".$this->getType()."</td>
                    <td>".$this->getPlace()."</td>
                    <td>".$this->getDiscipline()."</td>
                </tr>";
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
    public function getPlace(): string{
        return $this->place;
    }
    /**
     * @param string $place
     */
    public function setPlace(string $place): void{
        $this->place = $place;
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
    public function getDiscipline(): string{
        return $this->discipline;
    }
    /**
     * @param string $discipline
     */
    public function setDiscipline(string $discipline): void{
        $this->discipline = $discipline;
    }
}
