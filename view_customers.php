<?php
include 'db.php';

$sql = "SELECT * FROM customers ORDER BY customer_id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Customers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Customer List</h1>

    <table border="1" cellpadding="10">

        <tr>
            <th>Customer ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
        </tr>

        <?php
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
        ?>

        <tr>
            <td><?php echo $row['customer_id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['address']; ?></td>
        </tr>

        <?php
            }
        }
        else
        {
        ?>

        <tr>
            <td colspan="5">No customers found.</td>
        </tr>

        <?php } ?>

    </table>

    <br>

    <a href="index.php">
        <button>Back to Dashboard</button>
    </a>

</div>

</body>
</html>