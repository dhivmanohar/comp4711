<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            echo 'tic tac toe';
            $position = $_GET['board'];
            if(!isset($_GET['board'])){
                echo 'not set';
            }
            $squares = str_split($position);
            if(winner('x',$squares)){
                echo 'You win.';
            }
            else if(winner('o', $squares)){
                echo 'I win';
            }
            else {
                echo 'No winner yet.';
            }
        ?>
    </body>
</html>
<?php
    function winner($token,$position){
        $won = false;
        //horizontal
        for($row = 0; $row < 3; $row++){
            $won = true;
            for($col = 0; $col < 3; $col++){
                if($position[3* ($row + $col)] != $token)
                    $won = false;
            }
        }
        //fix logic
        /*
        $won = false;
        if(($position[0] == $token)&&
            ($position[1] == $token)&&
            ($position[2] == $token)) {
            $won = true;
        } else if(($position[3] == $token) &&
                  ($position[4] == $token) &&
                  ($position[5] == $token)){
            $won = true;
        }
        */
        return $won;
    }
?>

