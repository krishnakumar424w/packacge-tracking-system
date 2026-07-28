<?php
include 'db.php';

$sql = "SELECT * FROM agents ORDER BY agent_id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Agents</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Registered Agents</h1>

    <table border="1" cellpadding="10">

        <tr>
            <th>Agent ID</th>
            <th>Agent Name</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>

        <?php
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
        ?>

        <tr>
            <td><?php echo $row['agent_id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['email']; ?></td>
        </tr>

        <?php
            }
        }
        else
        {
        ?>

        <tr>
            <td colspan="4">No agents found.</td>
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