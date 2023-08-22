<?php 
 session_start();
 include "db_conn.php";

$q="SELECT * FROM `msg`";
if ($rq = mysqli_query($conn, $q)){

    if(mysqli_num_rows($rq)>0){

        while ($data = mysqli_fetch_assoc($rq)){

            if($data["username"]==$_SESSION["username"]){
                ?>
                <p class="sender"><span class="talk">&nbsp&nbsp&nbsp&nbsp&nbsp<?= 
                $data["username"]
                ?>
                 : 
                <?=
                $data["msg"]
                ?> </span></p>
                <?php
            } else {
                ?>
                <p><span class="talk">&nbsp&nbsp&nbsp&nbsp&nbsp<?= 
                $data["username"]
                ?>
                 : 
                <?=
                $data["msg"]
                ?> </span></p>
                <?php
            }

        }


    } else {
        echo "<h3>Chat is empty at this moment!!</h3>";
    }
}

?>