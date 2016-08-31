
<html>
    <head>
        <script src="//code.jquery.com/jquery-2.0.3.min.js"></script>
    </head>
    <body>

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
        ?>

        <select id="country_value">
            <?php
            $sql = "SELECT * FROM country";
            $result = $conn->query($sql);
//echo '<pre>';print_r($result);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['id'] . '">' . $row['country_name'] . '</option>';
                }
            } else {
                echo "0 results";
            }
            ?> 
        </select>
        <select name="state" id="state_value">
            <option value="select">Select</option>
        </select>


    </body>
</html>
<script>
    $('#country_value').change(function() {
        var country_id = $("#country_value").val();
    //    alert(country_id);
        var url5 = 'state.php';
        $.post(url5, {country_id: country_id}, function(result) {
            alert(result);
           $("#state_value").html(result);
        });
    });

</script>
