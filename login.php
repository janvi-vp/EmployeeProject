<?php
    session_start();
    include('php/db.php');
    if(isset($_POST['login']))
    {
        $username=$_POST['username'];
        $pwd=($_POST['pwd1']);
        $sql ="SELECT * FROM register WHERE username=:username and pwd=:pwd";
        $query= $db -> prepare($sql);
        $query-> bindParam(':username', $username, PDO::PARAM_STR);
        $query-> bindParam(':pwd', $pwd, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetch();
        /* $results=$query->fetchAll(PDO::FETCH_ASSOC);    
        foreach ($results as $row) {
            $name= $row['namee'];
        } */
        if($query->rowCount() == 1)
        {
            $_SESSION['username'] = $username;
            $_SESSION['designation'] = $results['designation'];
            // $_SESSION['nlogin']=$name;
            echo 1;
            //header("location: home.php");
        } else{
            echo 2;
        }
    }

?>
