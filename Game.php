<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Game
 *
 * @author Dhivya
 */
class Game {
    //put your code here
    var $position;
    var $newposition;
    function __construct ($squares) {
        $this->position = str_split($squares);
    }
    function winner($token){
        $won = false;
        for($col= 0; $col < 3; $col+= 3){
            $won = true;
            for($row = 0; $row < 3; $row++){
                if($this->position[$row] != $token){
                    $won = false;
                }
            }
        }
        return $won;
    }

    function show_cell($which){
        $token = $this->position[$which];
        if($token <> '-')
            return '<td>'.$token.'</td>';
        $this->newposition = $this->position;
        $this->newposition[$which] = 'o';
        $move = implode($this->newposition);
        $link = '/?board='.$move;
        return '<td><a href="'.$link.'">-</a></td>';
    }

    function display(){
        echo '<table cols = "3">';
        echo '<tr>';
        for($pos = 0; $pos < 9; $pos++){
            echo $this->show_cell($pos);
            if($pos %3 == 2){
                echo '</tr><tr>';
            }
        }
        echo '</tr>';
        echo '</table>';

    }
}
