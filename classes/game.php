<?php

class Game {
    
    private $rounds = 0;
    private $hands = array("rock", "paper", "scissors");
    private $hands_wins = array("paper"=>array("rock"), "rock" => array("scissors"), "scissors"=>array("paper"));

    public function __construct() {
        
    }

    public function get_rounds() {
        return $this->rounds;
    }

    public function get_hands_wins() {
        return $this->hands_wins;
    }

    public function get_hands() {
        return $this->hands;
    }

    public function add_hand($newHand, $winsAgainst) {
        array_push($this->hands, $newHand);

        $this->hands_wins[$newHand] = $winsAgainst;
        foreach($winsAgainst as $win) {
            foreach($this->hands as $hand) {
                if($win == $hand || $newHand == $hand) {
                    continue;
                } 
                array_push($this->hands_wins[$hand], $newHand);
            }
        }

    }

    public function play_rounds($rounds) {
        $this->rounds = $rounds;
    }

    public function play() {
        if($this->rounds <= 0) {
            echo "You must set a valid number of rounds!";
        }

    }



}

?>