<!-- To Check that the Passwords Set in signup.php Match-->
<?php

    if(isset($_POST['pass'])){

        if($_POST['pass'] == $_POST['cpass']){
            echo '<p style="color:green;">Passwords Match</p>';
        } else{
            echo '<p style="color:red;">Passwords Do Not Match</p>';
        }
    }

?>