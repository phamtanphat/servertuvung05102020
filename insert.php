<?php
    require("connect.php");
    require("response.php");
    require('wordmodel.php');

    $en = $_POST['en'];
    $vn = $_POST['vn'];
    $ismemorized = $_POST['ismemorized'];

    if (strlen($en) <= 0){
        echo json_encode(new Response(false , "Dữ liệu tiếng việt rỗng" ,[]));
        return;
    } else if (strlen($vn) <= 0){
        echo json_encode(new Response(false , "Dữ liệu tiếng anh rỗng" ,[]));
        return;
    } else if (strlen($ismemorized) <= 0){
        echo json_encode(new Response(false , "Dữ liệu ghi nhớ rỗng" ,[]));
        return;
    } 
    $query = "INSERT INTO tuvung VALUES (null ,'$en','$vn','$ismemorized')";

    $data = mysqli_query($con , $query);
    $array = [];
  
    if($data){
        array_push($array, new WordModel( $con->insert_id ,$en,$vn,$ismemorized) );
        echo json_encode(new Response(true , null ,$array ));
    }else{
        echo json_encode(new Response(false , "Thêm thất bại" ,[]));
    }
?>