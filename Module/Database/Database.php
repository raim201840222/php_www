<?php
// 선언 -> 생성 -> 호출
// 데이터베이스 선언
    class Database{
        public $connect;
        // 복합객체 - 객체지향의 은닉화
        //public , private , protected
        private $Table;
        public function setTable($name){
            $this->Table = $name;

            //테이블 객체 연결
            return $this;
        }
        public function getTable(){
            return $this->Table;
        }
        // 생성자 메소드(함수))
        public function __construct($config){
            //테이블 객체 연결
            $this->Table = new Table($this);
            echo "클래스 생성<br>";
            $this->connect = 
            new mysqli($config['host'], $config['user'], $config['password'],$config['database']);
            //성공 : connect_errno = 0 .. ! 1
            //실패 : connect_errno = 1 .. ! 0
            if(!$this->connect->connect_errno){
                echo "DB 접속성공<br>";
            }else{
                echo "접속실패<br>";
            }
        }
        public function queryExecute($query){
            $result = mysqli_query($this->connect, $query);
            if($result){
                echo "쿼리 성공<br>";
            }else{
                print "쿼리 실패.<br>";
            }
            return $result;
        }
        // 테이블 확인
        public function isTable($tablename){
            $query = "SHOW TABLES";
            $result = $this-> queryExecute($query);

            $count = mysqli_num_rows($result);
            echo "테이블의 갯수는 = ".$count;
            echo "</br>";
            for($i=0;$i<$count;$i++){
                $row = mysqli_fetch_object($result);
                if($row->Tables_in_php == $tablename){
                    return true;
                }
            }
                return false;
            }
        }