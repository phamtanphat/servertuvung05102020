<?php
    require('connect.php');
    require('responsepagination.php');
    require('wordmodel.php');

    // Cau query
    $currentpage = $_GET['page'];
    $items_per_page = $_GET['numitems'];
    if (!$currentpage){
        $currentpage = 1;
    }
    if(!$items_per_page){
        $items_per_page = 5;
    }
    
    $offset = ($currentpage - 1) * $items_per_page;

    $query = "SELECT * FROM tuvung ORDER BY id DESC LIMIT " . $offset . "," . $items_per_page ;

    $result = mysqli_query($con ,"SELECT * FROM tuvung");

    $row_cnt = $result->num_rows; 

    $pages = ceil($row_cnt/$items_per_page); 
    
    $data = mysqli_query($con , $query);

    $array = [];

    while($row = mysqli_fetch_assoc($data)){
       array_push($array , new WordModel($row['id'],$row['en'],$row['vn'],$row['ismemorized']));
    }

    echo json_encode(new ResponsePagination($pages,$currentpage,true,null,$array));

?>