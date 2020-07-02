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
            return;
        }

        $playerOneWins = 0;
        $playerTwoWins = 0;
        $roundNumber = 1;

        while($this->rounds > 0) {
            $random_key1=array_rand($this->hands);
            $random_key2=array_rand($this->hands);

            echo "Round " . $roundNumber . " play <br>";
            echo "Player 1 hand: " . $this->hands[$random_key1] . "<br>";
            echo "Player 2 hand: " . $this->hands[$random_key2] . "<br>";

            if($this->hands[$random_key2] == $this->hands[$random_key1]) {
                echo 'Round ' . $roundNumber . ' result: EVEN <br> <br>' ;
                continue;
            }

            if(in_array($this->hands[$random_key2], $this->hands_wins[$this->hands[$random_key1]])) {
                echo 'Round ' . $roundNumber . ' result: Player 1 WINS <br> <br>';
                $playerOneWins++; 
                $roundNumber++;
                $this->rounds--;
            } else {
                echo 'Round ' . $roundNumber . ' result: Player 2 WINS <br> <br>';
                $playerTwoWins++; 
                $roundNumber++;
                $this->rounds--;
            }

            

        }
        $this->declareFinalWiner($playerOneWins, $playerTwoWins);
    }

    private function declareFinalWiner($playerOneWins, $playerTwoWins) {
        if($playerOneWins == $playerTwoWins) {
            echo "The players are even!";
        } else { 
            $result = ($playerOneWins > $playerTwoWins) ? '1' : '2';
            echo "Player 1 total wins: " . $playerOneWins . "<br>";
            echo "Player 2 total wins: " . $playerTwoWins . "<br>";
            echo "Player " . $result . " is the FINAL winner";
        }
    }



}

?>