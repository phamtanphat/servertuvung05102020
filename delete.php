<?php
    require("connect.php");
    require("response.php");
    require('wordmodel.php');

    $id = $_POST['id'];
    if (strlen($id) <= 0){
        echo json_encode(new Response(false , "Bạn chưa truyền id" ,[]));
        return;
    }
    
    $queryFilter = "SELECT * FROM tuvung Where id = '$id' LIMIT 1";
    $dataFilter = mysqli_query($con , $queryFilter);

    $rowcount = mysqli_num_rows($dataFilter);

    if ($rowcount > 0){
        $query = "DELETE FROM tuvung WHERE id = '$id'";

        $data = mysqli_query($con , $query);
        $array = [];
      
        if($data){
            while($row = mysqli_fetch_assoc($dataFilter)){
                array_push($array , new WordModel($row['id'],$row['en'],$row['vn'],$row['ismemorized']));
            }
            echo json_encode(new Response(true , null ,$array ));
        }else{
            echo json_encode(new Response(false , "Xóa thất bại" ,[]));
        }
    }else{
        echo json_encode(new Response(false , "Giá trị không tồn tại" ,[]));
    }
   
?>