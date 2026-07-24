<?php
include 'db.php';

$package = null;

if(isset($_POST['search']))
{
    $tracking_id = $_POST['tracking_id'];

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
    WHERE p.tracking_id = '$tracking_id'
    ";

    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        $package = $result->fetch_assoc();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Track Package</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Track Package</h1>

    <form method="POST">

        <label>Tracking ID</label>

        <input type="text"
               name="tracking_id"
               placeholder="Enter Tracking ID"
               required>

        <button type="submit" name="search">
            Track Package
        </button>

    </form>

    <br>

    <?php if($package){ ?>

    <table>

        <tr>
            <th>Tracking ID</th>
            <td><?php echo $package['tracking_id']; ?></td>
        </tr>

        <tr>
            <th>Customer</th>
            <td><?php echo $package['customer_name']; ?></td>
        </tr>

        <tr>
            <th>Weight</th>
            <td><?php echo $package['weight']; ?> KG</td>
        </tr>

        <tr>
            <th>Source</th>
            <td><?php echo $package['source']; ?></td>
        </tr>

        <tr>
            <th>Destination</th>
            <td><?php echo $package['destination']; ?></td>
        </tr>

        <tr>
            <th>Status</th>
            <td><?php echo $package['status']; ?></td>
        </tr>

        <tr>
            <th>Assigned Agent</th>
            <td>
                <?php
                echo $package['agent_name']
                ? $package['agent_name']
                : "Not Assigned";
                ?>
            </td>
        </tr>

    </table>

    <?php } elseif(isset($_POST['search'])) { ?>

        <p style="color:red;">
            Tracking ID not found!
        </p>

    <?php } ?>

    <br>

    <a href="index.php">
        <button>Back to Dashboard</button>
    </a>

</div>

</body>
</html>