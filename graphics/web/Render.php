<?php
include("../resources/graphicsFC/Data/Data.php");
class Graph {
    private $data;
    
    public function setData($totalTransactions, $arrayWSTimes, $arrayDBTimes) {
        $this->data = new Data();
        $this->data->render($totalTransactions, $arrayWSTimes, $arrayDBTimes);
    }
}
?>