<html>
    <head>
        <style>
            span.emojip{
                border: 5px solid blue;
                font-size: 100px;
            } 
            body{
/*                background-color: aquamarine;*/
                background-image: url('1.jpg');
                background-repeat: no-repeat;
                background-size: cover;
                margin-top: 100px;
                justify-content: center;
                width: 100%;
                text-align: center;
            }
            span1.color{
                color: whitesmoke;
                font-size: 25px;
            }
        </style>
    </head>
    <body>
        <?php
         echo"Nombre ingreado es: ";
         echo "<span1 class=\"color\"><b>$_REQUEST[nombre]</span1></b>";
         echo"<br>";
//        ---------------------------------array con ceros---------
//        Este array recoge donde tira las bombas y tambien sirve para recargar cuando se vuelve a jugar otra partida y asi no se queda donde cayeron las bombas en la anterior partida
        $ordenador= array("0","0","0","0","0","0","0","0","0");
//        print_r($ordenador);
//        for($i=0;$i<=8;$i++)
//        {
//            echo $ordenador[$i];
//        }
//    --------------------------------bucleBombas---------
//        Con este for el ordenador lanza de manera aleatoria las bombas en el tablero de juego
        for($i=0;$i<=2;$i++)
        {
            do{
                $x=rand(0,8);
            }while($ordenador[$x]=='1');
            $ordenador[$x]="1";
        }
//    print_r($ordenador);
//        -------------------------------------vector usuario-----------------------------
        echo"<br>";
//        Esta array con el for que tiene sirve para recoger los checkbox que ha selecionado el player en la pagina html Hundir_PGV.html
        $usuario= array("0","0","0","0","0","0","0","0","0");
         for($i=0;$i<=8;$i++)
        {
         if (isset($_REQUEST[$i])){
            $usuario[$i] = '1';
            }
        }

//        print_r($usuario);
        echo "<br>";
//         ---------------------------------for que compara los array y los muestra en tabla---------
//        Este bucle for con if hace que los valores de las array ordeandor y array user muestren si es agua,barco o hundido.
        
        for ($i = 0; $i < 9; $i++) 
        {
            if (($usuario[$i] == "1") && ($ordenador[$i] == "1")){
                echo "<span class=\"emojip\">☠️</span>";
            }elseif (($usuario[$i] == "0") && ($ordenador[$i] == "1")){
                echo "<span class=\"emojip\">💣</span>";
            }elseif (($usuario[$i] == "1") && ($ordenador[$i] == "0")){
                echo "<span class=\"emojip\">⛵</span>";
            }else {
                echo "<span class=\"emojip\">🌊</span>";
            } 
//            Este if hace que se pongan en forma de tabla
            if (($i == 2) || ($i == 5)) {
                echo "<br>";
            }

        }

        ?>
    </body>
</html>