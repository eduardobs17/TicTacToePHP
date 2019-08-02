<?php
    $winner = 'n';
    $box = array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ');
    
    if (isset($_POST['submitbtn'])) {
        $box[0] = $_POST["box0"];
        $box[1] = $_POST["box1"];
        $box[2] = $_POST["box2"];
        $box[3] = $_POST["box3"];
        $box[4] = $_POST["box4"];
        $box[5] = $_POST["box5"];
        $box[6] = $_POST["box6"];
        $box[7] = $_POST["box7"];
        $box[8] = $_POST["box8"];

        if (($box[0] == 'X' && $box[1] == 'X' && $box[2] == 'X') ||
        ($box[3] == 'X' && $box[4] == 'X' && $box[5] == 'X') ||
        ($box[6] == 'X' && $box[7] == 'X' && $box[8] == 'X') ||
        ($box[0] == 'X' && $box[3] == 'X' && $box[6] == 'X') ||
        ($box[1] == 'X' && $box[4] == 'X' && $box[7] == 'X') ||
        ($box[2] == 'X' && $box[5] == 'X' && $box[8] == 'X') ||
        ($box[0] == 'X' && $box[4] == 'X' && $box[8] == 'X') ||
        ($box[2] == 'X' && $box[4] == 'X' && $box[6] == 'X')) {
            $winner = 'x';
            print("</br></br><h1><strong>Ganaste!!</strong></h1></br>");
        }

        $blank = 0;
        
        for ($i = 0; $i < 9; $i++) {
            if ($box[$i] == ' ') {
                $blank++;
            }
        }

        if ($blank > 0 && $winner == 'n') {
            $i = rand() % 8;
            while ($box[$i] != ' ') {
                $i = rand() % 8;
            }
            $box[$i] = 'O';

            if (($box[0] == 'O' && $box[1] == 'O' && $box[2] == 'O') ||
            ($box[3] == 'O' && $box[4] == 'O' && $box[5] == 'O') ||
            ($box[6] == 'O' && $box[7] == 'O' && $box[8] == 'O') ||
            ($box[0] == 'O' && $box[3] == 'O' && $box[6] == 'O') ||
            ($box[1] == 'O' && $box[4] == 'O' && $box[7] == 'O') ||
            ($box[2] == 'O' && $box[5] == 'O' && $box[8] == 'O') ||
            ($box[2] == 'O' && $box[4] == 'O' && $box[6] == 'O') ||
            ($box[0] == 'O' && $box[4] == 'O' && $box[8] == 'O')) {
                $winner = 'o';
                print("</br></br><h1><strong>Perdiste! :(</strong></h1></br>");
            }
        } else if ($winner == 'n') {
            $winner = 't';
            print("</br><h1>Hay Empate!</h1>.");
        }
    }
?>

<html>
    <head>
        <title> TicTacToe Game </title>
        <style type="text/css">
            .box {
                background-color: #c3ccb5;
                border: 3px solid #008000;
                width: 100px;
                height: 100px;
                font-size: 70px;
                text-align: center;
            }

            #go {
                width: 150px;
                height: 50px;
                background-color: #cddc39;
                font-size: 20px;
            }
        </style>
        <script>
            function cambiarColor(name) {
                document.getElementById("box0").style.backgroundColor = "#c3ccb5";
                document.getElementById("box1").style.backgroundColor = "#c3ccb5";
                document.getElementById("box2").style.backgroundColor = "#c3ccb5";
                document.getElementById("box3").style.backgroundColor = "#c3ccb5";
                document.getElementById("box4").style.backgroundColor = "#c3ccb5";
                document.getElementById("box5").style.backgroundColor = "#c3ccb5";
                document.getElementById("box6").style.backgroundColor = "#c3ccb5";
                document.getElementById("box7").style.backgroundColor = "#c3ccb5";
                document.getElementById("box8").style.backgroundColor = "#c3ccb5";

                if (document.getElementById("box0").readOnly != true) {document.getElementById("box0").value = ' '}
                if (document.getElementById("box1").readOnly != true) {document.getElementById("box1").value = ' '}
                if (document.getElementById("box2").readOnly != true) {document.getElementById("box2").value = ' '}
                if (document.getElementById("box3").readOnly != true) {document.getElementById("box3").value = ' '}
                if (document.getElementById("box4").readOnly != true) {document.getElementById("box4").value = ' '}
                if (document.getElementById("box5").readOnly != true) {document.getElementById("box5").value = ' '}
                if (document.getElementById("box6").readOnly != true) {document.getElementById("box6").value = ' '}
                if (document.getElementById("box7").readOnly != true) {document.getElementById("box7").value = ' '}
                if (document.getElementById("box8").readOnly != true) {document.getElementById("box8").value = ' '}

                if (document.getElementById(name).readOnly != true) {
                    document.getElementById(name).style.background = "red";
                    document.getElementById(name).value = 'X';
                }
            }
        </script>
    </head>
    <body bgcolor="green" align="center">
            <form name="tictactoe" action="index.php" method="post">
            <?php
                for ($i = 0; $i < 9; $i++) {
                    if ($box[$i] != ' ' || $winner != 'n') {
                        printf('<input type="text" onClick="cambiarColor(this.name)" name="box%s" value="%s" id="box%s" class="box" readonly="true">', $i, $box[$i], $i);
                    } else {
                        printf('<input type="text" onClick="cambiarColor(this.name)" name="box%s" value="%s" id="box%s" class="box">', $i, $box[$i], $i);
                    }
                    if ($i == 2 || $i == 5 || $i == 8) {
                        print('<br>');
                    }
                }
                
                if ($winner == 'n') {
                    print('</br><input type="submit" name="submitbtn" value="PLAY" id="go">');
                } else {
                    print('</br><input type="button" name="newgamebtn" value="PLAY AGAIN" onclick="window.location.href=\'index.php\'">');
                }
            ?>
            </form>
    </body>
</html>