<!DOCTYPE html>
<a href="index.html"><img src="images/h.png"  width=50 height=50/></a>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/student.css">
    <title>Result</title>
</head>
<body>
    <?php
        include("init.php");

        
        $rn=$_GET['srn'];

        // validation
        if (empty($rn) or preg_match("/[a-z]/i",$rn)) {
            
            if(empty($rn))
                echo '<p class="error">Please enter your srn number</p>';
            if(preg_match("/[a-z]/i",$rn))
                echo '<p class="error">Please enter valid srn number</p>';
            exit();
        }

        $name_sql=mysqli_query($conn,"SELECT `name` FROM `students` WHERE `srn`='$rn' ");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['name'];
        }
        $marks=0;

        $result_sql=mysqli_query($conn,"SELECT `p1`, `p2`, `p3`, `p4`, `p5` FROM `result` WHERE `srn`='$rn' ");

        while($row = mysqli_fetch_assoc($result_sql))
        {
            $p1 = $row['p1'];
            $p2 = $row['p2'];
            $p3 = $row['p3'];
            $p4 = $row['p4'];
            $p5 = $row['p5'];
          
  
        }
        if(mysqli_num_rows($result_sql)==0){
            echo "no result";
            exit();
        }
    ?>

    <div class="container">
        <div class="details">
            <span>Name:</span> <?php echo $name ?> <br>
            <span>Roll No:</span> <?php echo $rn; ?> <br>
        </div>

        <div class="main">
            <div class="s1">
                <p>Subjects</p>
                <p>Paper 1</p>
                <p>Paper 2</p>
                <p>Paper 3</p>
                <p>Paper 4</p>
                <p>Paper 5</p>
            </div>
            <div class="s2">
                <p>Marks</p>
                <?php echo '<p>'.$p1.'</p>';?>
                <?php echo '<p>'.$p2.'</p>';?>
                <?php echo '<p>'.$p3.'</p>';?>
                <?php echo '<p>'.$p4.'</p>';?>
                <?php echo '<p>'.$p5.'</p>';?>
            </div>
        </div>

        <div class="result">
             <?php $total=$p1+$p2+$p3+$p4+$p5; $per=$total/5; ?>

            <?php echo '<p>Total Marks:&nbsp'.$total.'</p>';?>
            <?php echo '<p>Total Per:&nbsp'.$per.'</p>';?>
        
        </div>

        <div class="button">
            <button onclick="window.print()">Print Result</button>
        </div>
    </div>
</body>
</html>