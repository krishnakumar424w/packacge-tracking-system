<?php
include 'db.php';

// Total Customers
$customers = $conn->query(
    "SELECT COUNT(*) AS total FROM customers"
);
$totalCustomers = $customers->fetch_assoc()['total'];

// Total Agents
$agents = $conn->query(
    "SELECT COUNT(*) AS total FROM agents"
);
$totalAgents = $agents->fetch_assoc()['total'];

// Total Packages
$packages = $conn->query(
    "SELECT COUNT(*) AS total FROM packages"
);
$totalPackages = $packages->fetch_assoc()['total'];

// Delivered Packages
$delivered = $conn->query(
    "SELECT COUNT(*) AS total
     FROM packages
     WHERE status='Delivered'"
);
$totalDelivered = $delivered->fetch_assoc()['total'];

// Delayed Packages
$delayed = $conn->query(
    "SELECT COUNT(*) AS total
     FROM packages
     WHERE status='Delayed'"
);
$totalDelayed = $delayed->fetch_assoc()['total'];

// Agent Workload
$workload = $conn->query("
    SELECT
        a.name,
        COUNT(p.package_id) AS package_count
    FROM agents a
    LEFT JOIN packages p
    ON a.agent_id = p.agent_id
    GROUP BY a.agent_id
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reports</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h1>Reports Dashboard</h1>

<table>

<tr>
    <th>Report</th>
    <th>Count</th>
</tr>

<tr>
    <td>Total Customers</td>
    <td><?php echo $totalCustomers; ?></td>
</tr>

<tr>
    <td>Total Agents</td>
    <td><?php echo $totalAgents; ?></td>
</tr>

<tr>
    <td>Total Packages</td>
    <td><?php echo $totalPackages; ?></td>
</tr>

<tr>
    <td>Delivered Packages</td>
    <td><?php echo $totalDelivered; ?></td>
</tr>

<tr>
    <td>Delayed Packages</td>
    <td><?php echo $totalDelayed; ?></td>
</tr>

</table>

<br><br>

<h2>Agent Workload</h2>

<table>

<tr>
    <th>Agent Name</th>
    <th>Assigned Packages</th>
</tr>

<?php while($row = $workload->fetch_assoc()) { ?>

<tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['package_count']; ?></td>
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