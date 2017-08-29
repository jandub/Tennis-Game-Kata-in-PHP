<?php

class TennisGame1 implements TennisGame
{
    private $scoreP1 = 0;
    private $scoreP2 = 0;

    private $nameP1 = "";
    private $nameP2 = "";

    private $lookup = array('Love', 'Fifteen', 'Thirty', 'Forty');

    public function __construct($nameP1, $nameP2)
    {
        $this->nameP1 = $nameP1;
        $this->nameP2 = $nameP2;
    }

    public function getScore()
    {
        $scoreDiff = abs($this->scoreP1 - $this->scoreP2);

        if (($this->scoreP1 >= 4 || $this->scoreP2 >= 4) && $scoreDiff >= 2) {
            return 'Win for ' . $this->getPlayerAhead();
        }

        if ($this->scoreP1 >= 3 && $this->scoreP2 >= 3) {
            if ($scoreDiff) {
                return 'Advantage ' . $this->getPlayerAhead();
            } else {
                return 'Deuce';
            }
        }

        return $this->lookup[$this->scoreP1] . '-' . 
            ($scoreDiff == 0 ? 'All' : $this->lookup[$this->scoreP2]);
    }

    private function getPlayerAhead() {
        return ($this->scoreP1 > $this->scoreP2 ? $this->nameP1 : $this->nameP2);
    }

    public function wonPoint($name)
    {
        if ($name == $this->nameP1) {
            $this->scoreP1++;
        } else {
            $this->scoreP2++;
        }
    }
}
