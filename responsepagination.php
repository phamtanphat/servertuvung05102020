<?php
    class ResponsePagination{
        function __construct($totalpage , $currentpage , $success, $message , $data){
            $this->totalpage=$totalpage;
            $this->currentpage=$currentpage;
            $this->success=$success;
            $this->message=$message;
            $this->data=$data;
        }
    }
?>