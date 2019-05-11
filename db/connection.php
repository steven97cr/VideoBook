<?php

class Connection{

    var $con;
    var $result;
    var $data;

    function __construct(){

    }

    function connect(){
        $this -> con = mysqli_connect('localhost','root','','dbVideoBook');
    }

    function disconnect(){

        mysqli_close($this -> con);
        mysqli_free_result($this -> result);

    }

    function query($query){
        $this -> connect();
        $this -> result = mysqli_query($this -> con, $query);

        if($this -> result){
            return array(
                'rows' => $this -> result,
                'errors' => false
            );
        }else{
            return array(
                'rows' => null,
                'errors' => mysqli_error($this -> con)
            );
        }
    }

    function getData($query){
        $result = $this -> query($query);
        $rows = array();

        if($result['rows']){
            while($row = mysqli_fetch_array($result['rows'])){
                $rows[]=$row;
            }
        }

        return $rows;
    }

}


?>