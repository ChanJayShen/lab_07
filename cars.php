<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Connection</title>
        <meta charset="utf-8">
</head>
<body>
    <?php
        require_once "settings.php";
        $conn = @mysqli_connect ($host, $user, $pwd, $sql_db);
        if ($conn)
        {
            echo "<p> Connection successful! </p>";
            $query = "SELECT * FROM cars";
            $result = mysqli_query($conn, $query);
            if($result)
                {
                    echo "<table>";
                    while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['car_id'] . "</td>";
                    echo "<td>" . $row['make'] . "</td>";
                    echo "<td>" . $row['model'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['yom'] . "</td>";
                    echo "</tr>";
                    }
                    echo "</table>";
                }
            else
                {
                echo "There are no cars to display.";
                }

                $query = "SELECT make, model, price FROM cars ORDER BY make, model";
            $result = mysqli_query($conn, $query);
            if($result)
                {
                    echo "<table>";
                    while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['make'] . "</td>";
                    echo "<td>" . $row['model'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "</tr>";
                    }
                    echo "</table>";
                }
            else
                {
                echo "There are no cars to display.";
                }

                $query = "SELECT make, model FROM cars WHERE price >= 20000";
            $result = mysqli_query($conn, $query);
            if($result)
                {
                    echo "<table>";
                    while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['make'] . "</td>";
                    echo "<td>" . $row['model'] . "</td>";
                    echo "</tr>";
                    }
                    echo "</table>";
                }
            else
                {
                echo "There are no cars to display.";
                }

                $query = "SELECT make, AVG(price) FROM cars GROUP BY make";
            $result = mysqli_query($conn, $query);
            if($result)
                {
                    echo "<table>";
                    while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['make'] . "</td>";
                    echo "<td>$" . $row['AVG(price)'] . "</td>";
                    echo "</tr>";
                    }
                    echo "</table>";
                }
            else
                {
                echo "There are no cars to display.";
                }

                $query = "SELECT make, model FROM cars WHERE price < 15000 AND price > 10000";
            $result = mysqli_query($conn, $query);
            if($result)
                {
                    echo "<table>";
                    while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['make'] . "</td>";
                    echo "<td>" . $row['model'] . "</td>";
                    echo "</tr>";
                    }
                    echo "</table>";
                }
            else
                {
                echo "There are no cars to display.";
                }
            mysqli_close($conn);
        }
        else
            echo "<p>Unable to connect to the db.</p>";
    ?>
</body>
</html>