<?php
require '../connection.php';
if(isset($_POST["id_pub2"])){
    $id_pub2=intval($_POST["id_pub2"]);
    $sql_finish_trueque = $con->prepare("DELETE FROM `trueke` WHERE id_pub2=?;") ;
    if($sql_finish_trueque){
        $sql_finish_trueque->bind_param("i",$id_pub2);
        $sql_finish_trueque->execute();
        if($sql_finish_trueque->affected_rows>0){
            print_r(json_encode(["canceled_trueke"=>true]));
        }else{
             print_r(json_encode(["canceled_trueke"=>false]));
        }

    }
};