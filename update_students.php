
<?php
   
   include('init.php');

if(isset($_POST['srn']))
{
    $srn = $_POST['srn'];
    $name = $_POST['name'];
    $class_name=$_POST['class_name1'];

       $sql = "UPDATE `students` SET `name`='$name',`class_id`='$class_name'  WHERE `srn`='$srn'";
         $update_sql=mysqli_query($conn,$sql);

        if(!$update_sql){
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Updated")';
            echo '</script>';
        }


  }
     if(isset($_GET['srn']))
{

  $srn = $_GET['srn'];
echo $srn;

  $r = mysqli_query($conn, "SELECT * FROM students JOIN class ON class_id=id WHERE srn=$srn");

        while($res = mysqli_fetch_array($r))
        {
            //$class_id=$res['_id'];
                $srn=$res['srn'];
                $name=$res['name'];
                $class_name=$res['class_name'];

        }
}

?>


<html lang="en">
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
   <link rel="stylesheet" href="./css/form.css"> 
    <title>Update Students</title>

</head>
<body>     
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading">Manage classes</span>
        <a href="logout.php" style="color: white"><span class="fa fa-sign-outa-2x">Logout</span></a>
    </div>
    <div class="nav">
        <ul>
            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Classes &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php">Add Class</a>
                    <a href="view_classes.php">View Class</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Students &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Add Students</a>
                    <a href="view_students.php">View Students</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">Results &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php">Add Results</a>
                    <a href="view_results.php">View Results</a>

                </div>
            </li>
        </ul>
    </div>    
 
 <br><br>
         <form  align= 'center'  method="post" action="update_students.php">
               <fieldset>
                <legend>Update student</legend>

<input type="number" name="srn" value="<?php echo $srn;?>">
                
                <input type="text" name="name" placeholder="name" value="<?php echo $name;?>">
<?php

                    
                    $class_result=mysqli_query($conn,"SELECT `class_name`,`id` FROM `class`");
                        echo '<select name="class_name1">';
                        echo '<option selected disabled>Select class_name</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['class_name'];
                        $id=$row['id'];
                        echo '<option value="'.$id.'">'.$display.'</option>';
                    }
                    echo'</select>'
               
                ?>
         
         

                <input type="submit" value="Update">
            </fieldset>
        </form>
        <br><br>
</body>
</html>
