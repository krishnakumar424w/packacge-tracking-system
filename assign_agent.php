<?php
include 'db.php';

$message = "";

// Assign Agent
if(isset($_POST['assign']))
{
    $package_id = $_POST['package_id'];
    $agent_id = $_POST['agent_id'];

    $sql = "UPDATE packages
            SET agent_id='$agent_id'
            WHERE package_id='$package_id'";

    if($conn->query($sql))
    {
        $message = "Agent Assigned Successfully!";
    }
    else
    {
        $message = "Error: " . $conn->error;
    }
}

// Fetch Packages
$packages = $conn->query("
    SELECT package_id, tracking_id
    FROM packages
");

// Fetch Agents (FIXED)
$agents = $conn->query("
    SELECT agent_id, name, phone, email
    FROM agents
");
?>

<h2>Assign Delivery Agent</h2>

<?php
if($message != "")
{
    echo "<p class='success'>$message</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Assign Delivery Agent</title>
    <style>
        body {
            font-family: Calibri, Arial, sans-serif;
            background: #f4f7fb;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 700px;
            margin: 60px auto;
            background: #fff;
            border: 2px solid #000;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            padding: 30px;
        }

        h2 {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #222;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 200px 1fr;
            gap: 15px 20px;
            align-items: center;
        }

        .label-cell {
            background: #0078d7;
            color: #fff;
            font-weight: bold;
            padding: 12px;
            border-radius: 6px;
            text-align: center;
            font-size: 18px;
        }

        .input-cell select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            outline: none;
        }

        .input-cell select:focus {
            border-color: #0078d7;
            box-shadow: 0 0 5px rgba(0,120,215,0.3);
        }

        button {
            grid-column: span 2;
            padding: 14px;
            background: #0078d7;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            background: #005fa3;
        }

        .success {
            background: #e6ffed;
            color: #1e7e34;
            padding: 10px;
            border-radius: 6px;
            text-align: center;
            margin-bottom: 15px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Assign Delivery Agent</h2>

    <?php if($message != "") { echo "<p class='success'>$message</p>"; } ?>

    <form method="POST" class="form-grid">
        <div class="label-cell">Select Package</div>
        <div class="input-cell">
            <select name="package_id" required>
                <option value="">Choose Package</option>
                <?php while($p = $packages->fetch_assoc()) { ?>
                    <option value="<?php echo $p['package_id']; ?>">
                        <?php echo $p['tracking_id']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="label-cell">Select Agent</div>
        <div class="input-cell">
            <select name="agent_id" required>
                <option value="">Choose Agent</option>
                <?php while($a = $agents->fetch_assoc()) { ?>
                    <option value="<?php echo $a['agent_id']; ?>">
                        <?php echo $a['name'] . " (" . $a['phone'] . " - " . $a['email'] . ")"; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <button type="submit" name="assign">Assign Agent</button>
    </form>
</div>

</body>
</html>
