﻿<?php
    require("connect.php");
    require("response.php");
    require('wordmodel.php');

    $id = $_POST['id'];
    $ismemorized = $_POST['ismemorized'];

    if (strlen($id) <= 0){
        echo json_encode(new Response(false , "Bạn chưa truyền id" ,[]));
        return;
    } else if (strlen($ismemorized) <= 0){
        echo json_encode(new Response(false , "Dữ liệu ghi nhớ rỗng" ,[]));
        return;
    } 

    $queryRow = "SELECT * FROM tuvung WHERE id = '$id'";

    $dataFilter = mysqli_query($con , $queryRow);

    $rowcount = mysqli_num_rows($dataFilter);

    if($rowcount > 0 ){
        $ismemorized = strcmp($ismemorized , 'true') == 0 ? true : false ;
        $ismemorized = intval($ismemorized);
        $query = "UPDATE tuvung SET ismemorized = '$ismemorized' WHERE id = '$id'";
        $data = mysqli_query($con , $query);
        $array = [];
        if($data){
            while($row = mysqli_fetch_assoc($dataFilter)){
                $row['ismemorized'] = boolval($ismemorized);
                array_push($array , new WordModel($row['id'],$row['en'],$row['vn'],$row['ismemorized']));
            }
            echo json_encode(new Response(true , null ,$array ));
       
        }else{
            echo json_encode(new Response(false , "Thêm thất bại" ,[]));
        }
       
    }else{
        echo json_encode(new Response(false , "Giá trị không tồn tại" ,[]));
    }
    
?>
