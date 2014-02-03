<?php
include("StringValidation.php");
include("Render.php");
class Log {    
    private $file = "../resources/WS_SPEI.log";
    private $stringValidation;
    private $WSTimes = array(4);
    private $DBTimes = array(4);
    private $render;
    
    public function validateExistenceLog() {
        if (file_exists($this->file)) {
            $this->readLog($this->file);
            return "SUCCESS";
        }
        return "file not found";
    }
    
    public function readLog(&$file) {
        $this->stringValidation = new StringValidation();
        $fileOpen = fopen($file, "r");
            while (!feof($fileOpen)) {
                $line = fgets($fileOpen);
                $this->stringValidation->validateLines($line);
            }
        $wsArray = StringValidation :: createArray($this->WSTimes, 'w');
        $dbArray = StringValidation :: createArray($this->DBTimes, 'd');
        $this->render = new Graph();
        $this->render->setData(StringValidation :: $totalTransactions, $wsArray, $dbArray);
        fclose($fileOpen);
    }
}
?>
