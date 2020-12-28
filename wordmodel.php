<?php

    class WordModel{
        function __construct($id , $en , $vn , $ismemorized){
            $this->id = $id;
            $this->en = $en;
            $this->vn = $vn;
            $this->ismemorized = $ismemorized;
        }
    }
?>