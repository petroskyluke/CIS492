<?php if ((!empty($_POST['coverset'])) && ($_POST['submit']=='Remove')){
            unlink("../img/portfolio/".$select_project/$_POST['coverset']);
        }
        ?>