<?php
include 'db.php';

$sql = "
SELECT
    p.*,
    c.name AS customer_name,
    a.name AS agent_name
FROM packages p
LEFT JOIN customers c
    ON p.customer_id = c.customer_id
LEFT JOIN agents a
    ON p.agent_id = a.agent_id
ORDER BY p.package_id DESC
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Packages</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Package List</h1>

    <table border="1" cellpadding="10">

        <tr>
            <th>Package ID</th>
            <th>Tracking ID</th>
            <th>Customer</th>
            <th>Weight (KG)</th>
            <th>Source</th>
            <th>Destination</th>
            <th>Status</th>
            <th>Assigned Agent</th>
        </tr>

        <?php
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
        ?>

        <tr>
            <td><?php echo $row['package_id']; ?></td>

            <td><?php echo $row['tracking_id']; ?></td>

            <td><?php echo $row['customer_name']; ?></td>

            <td><?php echo $row['weight']; ?></td>

            <td><?php echo $row['source']; ?></td>

            <td><?php echo $row['destination']; ?></td>

            <td><?php echo $row['status']; ?></td>

            <td>
                <?php
                echo $row['agent_name']
                ? $row['agent_name']
                : "Not Assigned";
                ?>
            </td>
        </tr>

        <?php
            }
        }
        else
        {
        ?>

        <tr>
            <td colspan="8">No packages found.</td>
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