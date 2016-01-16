<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php 
            
            require_once 'Game.php';// including Game class            
            $squares = $_GET['board'];// gettings all the different squares
            if ($squares == "") { // check to see if board squares were declared
                $squares = "---------";
            }
            $gamefinished = false; // variable to see if game has ended
            $game = new Game($squares); // create new Game object
            $game->pick_move(); // AI picks a moves
            if($game -> winner('x')){ //checks to see if it meets winning conditions
                echo 'You win';
                $gamefinished = true;
            }
            else if ($game -> winner ('o')){
                echo 'I win';
                $gamefinished = true;
            }
            else{
                echo 'Draw';
            }
            $game->display($gamefinished); //displays board
        ?>
    </body>
</html>

