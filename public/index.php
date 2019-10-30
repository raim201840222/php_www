<?php  
    $config = include "../dbconf.php";
    echo "대림대학교<br>";
    print_r($config);
    echo "<br>";

    require "../Loading.php";
    //require "../Module/Database/database.php"; // 1개
    //require "../Module/Database/Table.php"; // 2개

    $db = new Database($config);
    $table = new Table($db);
    $db ->getTable()->createTable(
        "member3",
        [
            'Last'=>"varchar(50)",
            'First'=>"varchar(50)",
            'Age'=>"varchar(50)",
        ]);

            $query = "SHOW TABLES";
            $result = $db-> queryExecute($query);

            $count = mysqli_num_rows($result);
            for($i=0;$i<$count;$i++){
                $row = mysqli_fetch_object($result);
                echo $row ->Tables_in_php."<br>";
            }

