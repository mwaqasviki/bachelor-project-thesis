<?php
session_start();
if(isset($_GET['table_no'])){
                      
    $table_no = $_GET['table_no'];
    $_SESSION['table_no']=$table_no;
    echo "<script>alert('$table_no')</script>";

    echo "<script>window.open('index.php','_self')</script>";
}
?>