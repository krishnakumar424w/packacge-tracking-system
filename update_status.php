<?php
include 'db.php';

$message = "";

if(isset($_POST['update']))
{
    $package_id = $_POST['package_id'];
    $status = $_POST['status'];

    $sql = "UPDATE packages
            SET status='$status'
            WHERE package_id='$package_id'";

    if($conn->query($sql))
    {
        $message = "Package status updated successfully!";
    }
    else
    {
        $message = "Error updating status.";
    }
}

$packages = $conn->query("
SELECT package_id,
       tracking_id,
       status
FROM packages
ORDER BY package_id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Package Status</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Update Package Status</h1>

    <?php if($message!=""){ ?>
        <p style="color:green;">
            <?php echo $message; ?>
        </p>
    <?php } ?>

    <form method="POST">

        <label>Select Package</label>

        <select name="package_id" required>

            <option value="">Choose Package</option>

            <?php while($row = $packages->fetch_assoc()){ ?>

                <option value="<?php echo $row['package_id']; ?>">
                    <?php echo $row['tracking_id']; ?>
                    (Current: <?php echo $row['status']; ?>)
                </option>

            <?php } ?>

        </select>

        <label>New Status</label>

        <select name="status" required>

            <option value="Created">Created</option>
            <option value="Picked Up">Picked Up</option>
            <option value="In Transit">In Transit</option>
            <option value="Out for Delivery">Out for Delivery</option>
            <option value="Delivered">Delivered</option>
            <option value="Delayed">Delayed</option>
            <option value="Lost">Lost</option>
            <option value="Returned">Returned</option>

        </select>

        <button type="submit" name="update">
            Update Status
        </button>

    </form>

    <br>

    <h2>Package Status Overview</h2>

    <table border="1" cellpadding="10">

        <tr>
            <th>Package ID</th>
            <th>Tracking ID</th>
            <th>Status</th>
        </tr>

        <?php
        $allPackages = $conn->query("
        SELECT package_id,
               tracking_id,
               status
        FROM packages
        ORDER BY package_id DESC
        ");

        while($p = $allPackages->fetch_assoc()){
        ?>

        <tr>
            <td><?php echo $p['package_id']; ?></td>
            <td><?php echo $p['tracking_id']; ?></td>
            <td><?php echo $p['status']; ?></td>
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