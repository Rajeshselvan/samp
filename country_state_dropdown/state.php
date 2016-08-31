<?php


        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "contsate";
// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
//echo "Connected successfully";
        
        
     //   echo $_POST['country_id'];
        $sql = "SELECT * FROM state where country_id=".$_POST['country_id'];
            $result = $conn->query($sql);
//echo '<pre>';print_r($result);
            if ($result->num_rows > 0) {
                // output data of each row
                echo '<option>
                select state
            </option>';
                while ($row = $result->fetch_assoc()) {
                    
                    echo '<option value="' . $row['id'] . '">' . $row['state_name'] . '</option>';
                }
            } else {
                echo "0 results";
            }
        
        
        ?>



