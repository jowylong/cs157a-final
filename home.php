<?php
require_once "login_credentials.php";

$conn = new mysqli($hn, $un,$pw, $db); //Logs into the SQL databse to fetch tables, getting the info from login.php
if ($conn->connect_error) {
    die(mysql_fatal_error("Oops!", $conn));
}

date_default_timezone_set('America/Los_Angeles');

function show_table($conn) {
    
    //DELETE STAFF FUNCTION
    if (isset($_POST['staff_delete'])) {
        $id = $_POST['staff_id'];
        mysqli_query($conn,"DELETE FROM staff WHERE staff_id='$id'");
    }
    
    //STAFF TABLE SQL QUERY
    $query = "SELECT * FROM staff";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    echo "<table border='1'>";
    echo "<b>Staff Information</b>";
    echo "<tr>
            <td><b>Staff ID</b></td>
            <td><b>Staff First Name</b></td>
            <td><b>Staff Last Name</b></td>
            <td><b>Staff Phone #</b></td>
            <td><b>Operation</b></td>
        </tr>\n";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['staff_id']}</td>
                <td>{$row['staff_first_name']}</td>
                <td>{$row['staff_last_name']}</td>
                <td>{$row['staff_phone']}</td>
                <td>
                    <form method='post' action='home.php'>
                    <input type='hidden' name='staff_id' value='{$row['staff_id']}'>
                   <input type='submit' name='staff_delete' value='Delete'/> </form>
                </td>
            </tr>\n";
    }
    echo "</table>";
    echo nl2br("\n");
    
    
    //INSERT STAFF FUNCTION
    if (isset($_POST['staff_insert'])) {
        $id = $_POST['new_staff_id'];
        $fname = $_POST['new_staff_fname'];
        $lname = $_POST['new_staff_lname'];
        $phone = $_POST['new_staff_phone'];
        $query = "SELECT `staff_id` FROM `staff` WHERE `staff_id`='$id'";
        $result = $conn->query($query);
        if (!$result) die("Access failed. Please contact site owner for help.");
        $num = $result->num_rows;
        $result->close();
        if ($num == 1) {
            echo "'$id' was not added since it is already in the staff database.<br>"; //Gives user an error message if a row that contains the question exists in the database
        } else {
            $query = "INSERT INTO `staff` (`staff_id`, `staff_first_name`, `staff_last_name`, `staff_phone`) VALUES ('$id', '$fname', '$lname', '$phone');";
            $result = $conn->query($query); //Brings $query to insert new entry to the questions table
            echo "<meta http-equiv='refresh' content='0'>";
            if (!$result) die("Access failed. Please contact site owner for help.");
        }
        
    }
    
    //INSERT STAFF FORM
    echo "<form method='post' action='home.php'>
    Staff ID: <input type='text' name='new_staff_id'>   
    Staff First Name: <input type='text' name='new_staff_fname'>   
    Staff Last Name: <input type='text' name='new_staff_lname'>   
    Staff Phone #: <input type='text' name='new_staff_phone'>
    <input type='submit' name='staff_insert' value='Insert New Staff'/> </form>";
    
    //DELETE CUSTOMER FUNCTION
    if (isset($_POST['customer_delete'])) {
        $id = $_POST['customer_id'];
        mysqli_query($conn,"DELETE FROM staff WHERE staff_id='$id'");
    }
    
    //CUSTOMER TABLE SQL QUERY
    $query = "SELECT * FROM customer";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    echo nl2br("\n");
    echo "<table border='1'>";
    echo "<b>Customer Information</b>";
    echo "<tr>
            <td><b>Customer ID</b></td>
            <td><b>Customer First Name</b></td>
            <td><b>Customer Last Name</b></td>
            <td><b>Customer Phone #</b></td>
            <td><b>Operation</b></td>
        </tr>\n";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['customer_id']}</td>
                <td>{$row['customer_first_name']}</td>
                <td>{$row['customer_last_name']}</td>
                <td>{$row['customer_phone']}</td>
                <td>
                    <form method='post' action='home.php'>
                    <input type='hidden' name='customer_id' value='{$row['customer_id']}'>
                   <input type='submit' name='customer_delete' value='Delete'/> </form>
                </td>
            </tr>\n";
    }
    echo "</table>";
    
    
    //INSERT CUSTOMER FUNCTION
    if (isset($_POST['customer_insert'])) {
        $id = $_POST['new_customer_id'];
        $fname = $_POST['new_customer_fname'];
        $lname = $_POST['new_customer_lname'];
        $phone = $_POST['new_customer_phone'];
        $query = "SELECT `customer_id` FROM `customer` WHERE `customer_id`='$id'";
        $result = $conn->query($query);
        if (!$result) die("Access failed. Please contact site owner for help.");
        $num = $result->num_rows;
        $result->close();
        if ($num == 1) {
            echo "'$id' was not added since it is already in the customer database.<br>"; //Gives user an error message if a row that contains the question exists in the database
        } else {
            $query = "INSERT INTO `customer`(`customer_id`, `customer_first_name`, `customer_last_name`, `customer_phone`) VALUES ('$id', '$fname', '$lname', '$phone');";
            $result = $conn->query($query); //Brings $query to insert new entry to the questions table
            echo "<meta http-equiv='refresh' content='0'>";
            if (!$result) die("Access failed. Please contact site owner for help.");
        }
        
    }
    
    //INSERT CUSTOMER FORM
    echo "<form method='post' action='home.php'>
    <br>Customer ID: <input type='text' name='new_customer_id'>
    Customer First Name: <input type='text' name='new_customer_fname'>
    Customer Last Name: <input type='text' name='new_customer_lname'>
    Customer Phone #: <input type='text' name='new_customer_phone'>
    <input type='submit' name='customer_insert' value='Insert New Customer'/> </form>";
    
    //EQUIPMENT DELETE FUNCTION
    if (isset($_POST['equipment_delete'])) {
        $id = $_POST['equipment_id'];
        mysqli_query($conn,"DELETE FROM `equipment` WHERE `equipment_id`='$id'");
    }
    
    //EQUIPMENT TABLE SQL QUERY
    $query = "SELECT * FROM equipment";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    echo nl2br("\n");
    echo "<table border='1'>";
    echo "<b>Equipment Information</b>";
    echo "<tr>
            <td><b>Equipment ID</b></td>
            <td><b>Equipment Type</b></td>
            <td><b>Equipment Price Rate</b></td>
            <td><b>Equipment Description</b></td>
            <td><b>Equipment Seat Location</b></td>
            <td><b>Operation</b></td>
         </tr>\n";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['equipment_id']}</td>
                <td>{$row['equipment_type']}</td>
                <td>{$row['equipment_price_rate']}</td>
                <td>{$row['equipment_description']}</td>
                <td>{$row['equipment_seat_location']}</td>
                <td>
                    <form method='post' action='home.php'>
                    <input type='hidden' name='equipment_id' value='{$row['equipment_id']}'>
                   <input type='submit' name='equipment_delete' value='Delete'/> </form>
                </td>
            </tr>\n";
    }
    echo "</table>";
    
    //INSERT EQUIPMENT FUNCTION
    if (isset($_POST['equipment_insert'])) {
        $id = $_POST['new_equipment_id'];
        $type = $_POST['new_equipment_type'];
        $price = $_POST['new_equipment_price'];
        $desc = $_POST['new_equipment_desc'];
        $seat = $_POST['new_equipment_seat'];
        $query = "SELECT `equipment_id` FROM `equipment` WHERE `equipment_id`='$id'";
        $result = $conn->query($query);
        if (!$result) die("Access failed. Please contact site owner for help.");
        $num = $result->num_rows;
        $result->close();
        if ($num == 1) {
            echo "'$id' was not added since it is already in the equipment database.<br>"; //Gives user an error message if a row that contains the question exists in the database
        } else {
            $query = "INSERT INTO `equipment`(`equipment_id`, `equipment_type`, `equipment_price_rate`, `equipment_description`, `equipment_seat_location`) VALUES ('$id','$type','$price','$desc','$seat');";
            $result = $conn->query($query); //Brings $query to insert new entry to the questions table
            echo "<meta http-equiv='refresh' content='0'>";
            if (!$result) die("Access failed. Please contact site owner for help.");
        }
        
    }
    
    //INSERT EQUIPMENT FORM
    echo "<form method='post' action='home.php'>
    <br>Equipment ID: <input type='text' name='new_equipment_id'>
    Equipment Type: <input type='text' name='new_equipment_type'>
    Equipment Price Rate: <input type='text' name='new_equipment_price'>
    Equipment Description: <input type='text' name='new_equipment_desc'>
    Equipment Seat Location: <input type='text' name='new_equipment_seat'>
    <input type='submit' name='equipment_insert' value='Insert New Equipment'/> </form>";
    
    //DELETE GAME FUNCTION
    if (isset($_POST['game_delete'])) {
        $id = $_POST['game_id'];
        mysqli_query($conn,"DELETE FROM `game` WHERE `game_id`='$id'");
    }
    
    //GAME TABLE SQL QUERY
    $query = "SELECT * FROM game";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    echo nl2br("\n");
    echo "<table border='1'>";
    echo "<b>Game Information</b>";
    echo "<tr>
            <td><b>Game ID</b></td>
            <td><b>Game Name</b></td>
            <td><b>Game Equipment Type</b></td>
            <td><b>Operation</b></td>
        </tr>\n";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['game_id']}</td>
                <td>{$row['game_name']}</td>
                <td>{$row['game_equipment_type']}</td>
                <td>
                    <form method='post' action='home.php'>
                    <input type='hidden' name='game_id' value='{$row['game_id']}'>
                   <input type='submit' name='game_delete' value='Delete'/> </form>
                </td>
            </tr>\n";
    }
    echo "</table>";
    
    //INSERT GAME FUNCTION
    if (isset($_POST['game_insert'])) {
        $id = $_POST['new_game_id'];
        $name = $_POST['new_game_name'];
        $type = $_POST['new_game_type'];
        $query = "SELECT `game_id` FROM `game` WHERE `game_id`='$id'";
        $result = $conn->query($query);
        if (!$result) die("Access failed. Please contact site owner for help.");
        $num = $result->num_rows;
        $result->close();
        if ($num == 1) {
            echo "'$id' was not added since it is already in the game database.<br>"; //Gives user an error message if a row that contains the question exists in the database
        } else {
            $query = "INSERT INTO `game`(`game_id`, `game_name`, `game_equipment_type`) VALUES ('$id','$name','$type');";
            $result = $conn->query($query); //Brings $query to insert new entry to the questions table
            echo "<meta http-equiv='refresh' content='0'>";
            if (!$result) die("Access failed. Please contact site owner for help.");
        }
        
    }
    
    //INSERT GAME FORM
    echo "<form method='post' action='home.php'>
    <br>Game ID: <input type='text' name='new_game_id'>
    Game Name: <input type='text' name='new_game_name'>
    Game Equipment Type: <input type='text' name='new_game_type'>
    <input type='submit' name='game_insert' value='Insert New Game'/> </form>";
    
    //DELETE RENTED EQUIPMENT FUNCTION
    if (isset($_POST['rented_equipment_delete'])) {
        $id = $_POST['equipment_id'];
        mysqli_query($conn,"DELETE FROM `rental_equipment` WHERE `equipment_id`='$id'");
    }
    
    //RENTED EQUIPMENT TABLE SQL QUERY
    $query = "SELECT * FROM rental_equipment";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    echo nl2br("\n");
    echo "<table border='1'>";
    echo "<b>Currently Rented Equipment Information</b>";
    echo "<tr>
            <td><b>Equipment ID</b></td>
            <td><b>Customer ID</b></td>
            <td><b>Assigned Staff ID</b></td>
            <td><b>Start Time</b></td>
            <td><b>End Time</b></td>
            <td><b>Total Cost</b></td>
            <td><b>Operation</b></td>
        </tr>\n";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['equipment_id']}</td>
                <td>{$row['customer_id']}</td>
                <td>{$row['staff_id']}</td>
                <td>{$row['rental_time_start']}</td>
                <td>{$row['rental_time_end']}</td>
                <td>{$row['rental_cost']}</td>
                <td>
                    <form method='post' action='home.php'>
                    <input type='hidden' name='equipment_id' value='{$row['equipment_id']}'>
                   <input type='submit' name='rented_equipment_delete' value='Delete'/> </form>
                </td>
            </tr>\n";
    }
    echo "</table>";
    
    //INSERT RENTAL EQUIPMENT FUNCTION
    if (isset($_POST['rental_equipment_insert'])) {
        $e_id = $_POST['equipment_id'];
        $c_id = $_POST['customer_id'];
        $s_id = $_POST['staff_id'];
        $time = $_POST['duration'];
        $duration = date('Y-m-d H:i:s', strtotime($time.' hour'));
        $current = date('Y-m-d H:i:s');
        
        $query = "SELECT `equipment_id` FROM `rental_equipment` WHERE `equipment_id`='$e_id'";
        $result = $conn->query($query);
        if (!$result) die("Access failed. Please contact site owner for help.");
        $num = $result->num_rows;
        $result->close();
        if ($num == 1) {
            echo "'$e_id' was not added since it is already being rented out.<br>"; //Gives user an error message if a row that contains the question exists in the database
        } else {
            $query = "SELECT `equipment_price_rate` FROM `equipment` WHERE `equipment_id`='$e_id'";
            $result = $conn->query($query);
            $base = mysqli_fetch_column($result, 0);
            $total = $base*$time;
            $query = "INSERT INTO `rental_equipment`(`equipment_id`, `customer_id`, `staff_id`, `rental_time_start`, `rental_time_end`, `rental_cost`) VALUES ('$e_id','$c_id','$s_id','$current','$duration','$total');";
            $result = $conn->query($query); //Brings $query to insert new entry to the questions table
            echo "<meta http-equiv='refresh' content='0'>";
            if (!$result) die("Access failed. Please contact site owner for help.");
        }
        
    }
    
    //INSERT RENTAL EQUIPMENT FORM
    echo "<form method='post' action='home.php'>
    <br>Equipment ID: <input type='text' name='equipment_id'>
    Customer ID: <input type='text' name='customer_id'>
    Assigned Staff ID: <input type='text' name='staff_id'>
    Duration (# in hours): <input type='text' name='duration'>
    <input type='submit' name='rental_equipment_insert' value='Rent Out Equipment'/> </form>";
    
    //DELETE RENTED GAME FUNCTION
    if (isset($_POST['rented_game_delete'])) {
        $id = $_POST['game_id'];
        mysqli_query($conn,"DELETE FROM `rental_game` WHERE `game_id`='$id'");
    }
    
    //RENTED GAME TABLE SQL QUERY
    $query = "SELECT * FROM rental_game";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    echo nl2br("\n");
    echo "<table border='1'>";
    echo "<b>Currently Rented Game Information</b>";
    echo "<tr>
            <td><b>Game ID</b></td>
            <td><b>Customer ID</b></td>
            <td><b>Assigned Staff ID</b></td>
            <td><b>Operation</b></td>
        </tr>\n";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['game_id']}</td>
                <td>{$row['customer_id']}</td>
                <td>{$row['staff_id']}</td>
                <td>
                    <form method='post' action='home.php'>
                    <input type='hidden' name='game_id' value='{$row['game_id']}'>
                   <input type='submit' name='rented_game_delete' value='Delete'/> </form>
                </td>
            </tr>\n";
    }
    echo "</table>";
    
    //INSERT RENTAL GAME FUNCTION
    if (isset($_POST['rental_game_insert'])) {
        $g_id = $_POST['game_id'];
        $c_id = $_POST['customer_id'];
        $s_id = $_POST['staff_id'];
        $query = "SELECT `game_id` FROM `rental_game` WHERE `game_id`='$id'";
        $result = $conn->query($query);
        if (!$result) die("Access failed. Please contact site owner for help.");
        $num = $result->num_rows;
        $result->close();
        if ($num == 1) {
            echo "'$id' was not added since it is already rented out.<br>"; //Gives user an error message if a row that contains the question exists in the database
        } else {
            $query = "INSERT INTO `rental_game`(`game_id`, `customer_id`, `staff_id`) VALUES ('$g_id','$c_id','$s_id');";
            $result = $conn->query($query); //Brings $query to insert new entry to the questions table
            echo "<meta http-equiv='refresh' content='0'>";
            if (!$result) die("Access failed. Please contact site owner for help.");
        }
        
    }
    
    //INSERT RENTED GAME FORM
    echo "<form method='post' action='home.php'>
    <br>Game ID: <input type='text' name='game_id'>
    Customer ID: <input type='text' name='customer_id'>
    Assigned Staff ID: <input type='text' name='staff_id'>
    <input type='submit' name='rental_game_insert' value='Rent Out Game'/> </form>";
    
    $result->close(); //Closes result connection
}


show_table($conn);

?>
