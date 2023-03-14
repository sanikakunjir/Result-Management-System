<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" type='text/css' href="css/view.css">
    <title>View Classes</title>
    <style>

    th, td {
  border-style: outset;
}
 </style>
</head>
<body>
        
    <div class="title">
        <a href="logout.php" style="color: white"><span class="fa fa-sign-out fa-2x">Logout</span></a>
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

    <div class="main">
        <form  align= 'center' action="view_classes.php" method="post">
            <input type="text"   name="valueToSearch" placeholder="Value To Search"><br><br>
            <input class="button" type="submit" name="search" value="Filter"><br><br>
        </form>
</body>        
</html>
<?php

include('init.php');
include('session.php');

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM class WHERE CONCAT(class_name) LIKE '%".$valueToSearch."%' ";
    $search_result = filterTable($query);
}
else 
{
    $query = "SELECT * FROM class";
    $search_result = filterTable($query);
}


function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "srms");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

if(isset($_GET['id']))
{

    $sql = "DELETE FROM class WHERE id='" . $_GET["id"] . "'";
    if (mysqli_query($conn, $sql)) 
    {
        header('location:' .$_SERVER['PHP_SELF']);
        die;
    } 
    else 
    {
        echo "<p class='background' align= 'center'>Error deleting record: " . mysqli_error($conn);

    }
}
?>

<!DOCTYPE html>
<html>
   <body> 

               <center>
                <table>
                <tr>
                <th>CLASS NAME</th>
                <th>Delete</th>
                <th>Update</th>
 
                </tr>

               <?php while($rows = mysqli_fetch_array($search_result)):?>
                <tr>                 
                  <td><?php echo $rows['class_name'];?></td>
                  <td><a href="view_classes.php?id=<?php echo $rows['id']; ?>"> delete</a></td>
                  <td><a href="update_classes.php?id=<?php echo $rows['id']; ?>"> update</a></td>
            
               </tr>
                <?php endwhile;?>
            </table>
    </div>

</body>
</html>


