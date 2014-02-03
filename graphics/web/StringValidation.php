<?php
class StringValidation { 
    private $dataBaseTimes = array();
    private $data;
    private static $init = 0;
    public static $totalTransactions = 0;
    private static $ws_total_gtoe_10 = 0;
    private static $ws_total_gtoe_6_alt_10 = 0;
    private static $ws_total_gtoe_1_alt_6 = 0;
    private static $ws_total_lt_1 = 0;
    private static $db_total_gtoe_10 = 0;
    private static $db_total_gtoe_6_alt_10 = 0;
    private static $db_total_gtoe_1_alt_6 = 0;
    private static $db_total_lt_1 = 0;
    
    public function validateLines($line) {
        $line = trim($line);
        if (!empty($line)) {
            $pieces = explode(" ", $line);
            $this->getTimes($pieces);
        }
        
    }
    
    public function getTimes($wordArray) {
        foreach ($wordArray as $key => $value) {
            if (strpos($wordArray[$key],"DataBase") !== false) {
                if (strpos($wordArray[$key+1],"Time:") !== false) {
                    $this->countTimesDataBase($wordArray[$key+2]);    
                }    
            } else if (strpos($wordArray[$key],"WebServices") !== false) {
                StringValidation :: $totalTransactions = StringValidation :: $totalTransactions+1;
                if (strpos($wordArray[$key+1],"Time:") !== false) {
                    $this->countTimesWebServices($wordArray[$key+2]);
                }    
            }
        }
    }
    
    public function countTimesWebServices($time) {
        if ($time >= 10000) {
            StringValidation :: $ws_total_gtoe_10++;    
        } else if ($time >= 6000 && $time < 10000) {
            StringValidation :: $ws_total_gtoe_6_alt_10++;
        } else if ($time >= 1000 && $time < 6000) {
            StringValidation :: $ws_total_gtoe_1_alt_6++;    
        } else if ($time < 1000) {
            StringValidation :: $ws_total_lt_1++;    
        }
    }
    
    public function countTimesDataBase($time) {
        if ($time >= 10000) {
            StringValidation :: $db_total_gtoe_10++;    
        } else if ($time >= 6000 && $time < 10000) {
            StringValidation :: $db_total_gtoe_6_alt_10++;
        } else if ($time >= 1000 && $time < 6000) {
            StringValidation :: $db_total_gtoe_1_alt_6++;    
        } else if ($time < 1000) {
            StringValidation :: $db_total_lt_1++;    
        }
    }
    
    public static function createArray($array, $flag) {
        if ($flag == 'w') {
            $array[0] = StringValidation :: $ws_total_gtoe_10;
            $array[1] = StringValidation :: $ws_total_gtoe_6_alt_10;
            $array[2] = StringValidation :: $ws_total_gtoe_1_alt_6;
            $array[3] = StringValidation :: $ws_total_lt_1;
            return $array;
        } else if ($flag == 'd') {
            $array[0] = StringValidation :: $db_total_gtoe_10; 
            $array[1] = StringValidation :: $db_total_gtoe_6_alt_10;
            $array[2] = StringValidation :: $db_total_gtoe_1_alt_6;
            $array[3] = StringValidation :: $db_total_lt_1;
            return $array;
        }
        
    }
}

?>
