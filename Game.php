<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This is a simple tic tac toe that plays against a simple AI that
 * chooses the first blank space it sees. 
 *
 * @author Dhivya
 */
class Game {
    //put your code here
   
    var $position; // position on the board
    var $newposition; //updated board with new positions
    /**
     * Constructor for the Game class
     * @param type $squares
     */
    function __construct ($squares) {
        $this->position = str_split($squares);
    }
    
    /**
     * Checks to see if there is a winner
     * @param type $token
     * @return boolean if there is a winner
     */
    function winner($token){
        $won = false;
        for($row= 0; $row < 3; $row++){           
            if($this->position[3*$row+0] == $token &&
                $this->position[3*$row+1] == $token &&
                $this->position[3*$row+2] == $token){
                $won = true;
            }           
        }
        
        for($col= 0; $col < 3; $col++){           
            if($this->position[3*$row+0] == $token &&
                $this->position[3*$row+3] == $token &&
                $this->position[3*$row+6] == $token){
                $won = true;
            }           
        }
        
        if ((($this->position[0] == $token) && ($this->position[4] == $token) && ($this->position[8] == $token))
            || (($this->position[2] == $token) && ($this->position[4] == $token) && ($this->position[6] == $token))) {
            $won = true;
        }
        
        return $won;
    }
    
    /**
     * Shows which cell is available to click and which cells
     * have need a 'x' or 'o'. Also checks to see if the game
     * has finished and doesn't allow user to click if finished
     * @param type $which
     * @param type $gamefinished
     * @return string
     */
    function show_cell($which, $gamefinished){
        $token = $this->position[$which];
        if($token <> '-'){
            return '<td>'.$token.'</td>';
        }
        if ($gamefinished) {
            return '<td>-</td>';
        }
        $this->newposition = $this->position;
        $this->newposition[$which] = 'o';
        $move = implode($this->newposition);
        $link = './?board='.$move;
        return '<td><a href="'.$link.'">-</a></td>';
    }
    
    /**
     * Displays the board
     * @param type $gamefinished
     */
    function display($gamefinished){
        echo '<table cols = "3">';
        echo '<tr>';
        for($pos = 0; $pos < 9; $pos++){
            echo $this->show_cell($pos, $gamefinished);
            if($pos %3 == 2){
                echo '</tr><tr>';
            }
        }
        echo '</tr>';
        echo '</table>';

    }
    
    /**
     * A simple AI that picks the first available blank space
     */
    function pick_move(){
        for($i = 0; $i < 9; $i++) {
            if ($this->position[$i] == '-') {
                $this->position[$i] = 'x';
                break;
            }
        }
    }
}
