

 <?php
    include('init.php');
    if(isset($_POST['class_name'],$_POST['class_name_new'])) 
    {

        $class_name=$_POST['class_name'];
        $class_name_new=$_POST['class_name_new'];

    
        $sql =  "UPDATE `class` SET `class_name`='$class_name_new' WHERE `class_name`='$class_name'";
        $update_sql=mysqli_query($conn,$sql);

        if(!$update_sql)
        {
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        } 
        else 
        {
            echo '<script language="javascript">';
            echo 'alert("Updated")';
            echo '</script>';
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
    <title>Update Class</title>
   <style>

    th, td {
  border-style: outset;
}
 </style>
</head>

<body>  
    <div class="title">
        <a href="dashboard.php">dashboard</a>
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
         <form  align= 'center'  method="post" action="update_classes.php">
               <fieldset>
                <legend>Update class</legend>

<?php
    if(isset($_GET['id'])) 
    {
           $class_name = $_GET['id'];
            // echo $class_name;

        $result = mysqli_query($conn, "SELECT * FROM class WHERE `id`='$class_name'");

        while($res = mysqli_fetch_array($result))
        {
            //$id=$res['id'];
                $class_name=$res['class_name'];
        }
   }
?> 

               <input type="text" name="class_name" value="<?php echo $class_name;?>">
                <input type="text" name="class_name_new" placeholder="new class name">
    

                <input type="submit" value="update">
            </fieldset>
        </form>

        <br><br>
</body>
</html>




