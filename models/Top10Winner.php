<?php

use JetBrains\PhpStorm\Pure;

require_once "models/Person.php";
require_once "interfaces/HtmlTableRow.php";

class Top10Winner extends Person implements HtmlTableRow {
    private string $birthPlace;
    private int $goldMedal;

    #[Pure] public function getHtmlTableRow(): string{
        return "<tr>
                    <td class='click-person' onmouseover='hoverNameOver(this)' onmouseout='hoverNameOut(this)' onclick=\"window.location='details.php?id=$this->id'\">".$this->getName()."</td>
                    <td class='click-person' onmouseover='hoverNameOver(this)' onmouseout='hoverNameOut(this)' onclick=\"window.location='details.php?id=$this->id'\">".$this->getSurname()."</td>
                    <td>".$this->getBirthPlace()."</td>
                    <td>".$this->getGoldMedal()."</td>
                    <td>
                        <button onclick=\"window.location='edit-form.php?id=$this->id'\" type='button' class='btn btn-outline-warning table-button' >
                            <img src='resources/pictures/browser.svg' width='16' height='16' alt='delete'>           
                        </button>
                    </td>
                    <td>
                        <button onclick=\"window.location='delete.php?id=$this->id'\" type='button' class='btn btn-outline-danger table-button'>
                            <img src='resources/pictures/trash.svg' width='16' height='16' alt='edit'>
                        </button>
                    </td>
                </tr>";
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
     * @return int
     */
    public function getGoldMedal(): int{
        return $this->goldMedal;
    }
    /**
     * @param int $goldMedal
     */
    public function setGoldMedal(int $goldMedal): void{
        $this->goldMedal = $goldMedal;
    }
}
