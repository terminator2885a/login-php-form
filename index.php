<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XD</title>
</head>
<body>
    <?php
        $logged = false;
        $users = [
            "admin" => "test",
            "user1" => "1111"
        ];
        $baza = mysqli_connect("localhost", "root","","portal_internetowy");
        if(!$baza) echo"FAILED";
        else{
        //Rejestracja
        if(isset($_POST["register"])){
            $login = $_POST["log"];
            $password = $_POST["pass"];
            $query = "INSERT INTO USERS(USRNAME, PASSWD) VALUES('" . $login . "', '". $password . "');";
            $query_pom = "SELECT * FROM USERS WHERE USRNAME = '" . $login . "';";
            if(mysqli_num_rows(mysqli_query($baza, $query_pom)) > 0) echo"Istnieje już taki użytkownik<br>";
            else $result = mysqli_query($baza, $query);
        }
        //Logowanie
        if(isset($_POST["submit"])){
            // if(array_key_exists($_POST["usrname"], $users)){
            //     if($users[$_POST["usrname"]] == $_POST["passwd"]){
            //         $logged = true;
            //     }
            // }
            $login = $_POST["usrname"];
            $pass = $_POST["passwd"];
            $query = "SELECT * FROM USERS WHERE USRNAME = '". $login . "' AND PASSWD = '" . $pass . "';";
            $result = mysqli_query($baza, $query);
            if(mysqli_num_rows($result) === 1) $logged = true;
        }
        if(!$logged){
    ?>
        <h1>Portal internetowy</h1>
        <a href="login.html">Zaloguj się</a>
    <?php
        }else{
    ?>
        <h1>Jesteś zalogowany</h1>
    <?php
        }
    }
    ?>

</body>
</html>