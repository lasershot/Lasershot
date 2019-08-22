<?php
    include('function.php');
    function save_name($user_id, $name, $url_pic, $score){
        $sql = "SELECT * FROM user_table WHERE user_id = '$user_id';";
        $result = confetch($sql);
        $con = con();

        if ($result[0]['score'] < $score){
            $sql = "DELETE FROM user_table WHERE name = '$name'";
            mysqli_query($con, $sql);

            $sql = "INSERT INTO user_table(user_id, name, url_pic, score) VALUES('$user_id','$name', '$url_pic', '$score')";
            mysqli_query($con, $sql);
        }

        if ($score > 0){
            $sql = "INSERT INTO score_table(score, owner_id) VALUES('$score','$user_id')";
            mysqli_query($con, $sql);
        }
    }
?>