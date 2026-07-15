<?php
include 'db.php';

$message = "";

if(isset($_POST['submit']))
{
    $customer_id = $_POST['customer_id'];
    $weight = $_POST['weight'];
    $source = $_POST['source'];
    $destination = $_POST['destination'];

    // Generate Tracking ID
    $tracking_id = "TRK" . rand(10000,99999);

    $sql = "INSERT INTO packages
            (tracking_id, customer_id, weight, source, destination, status)
            VALUES
            ('$tracking_id',
             '$customer_id',
             '$weight',
             '$source',
             '$destination',
             'Created')";

    if($conn->query($sql))
    {
        $message = "Package Created Successfully! Tracking ID: " . $tracking_id;
    }
    else
    {
        $message = "Error : " . $conn->error;
    }
}

$customers = $conn->query("SELECT * FROM customers");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Package</title>
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

        .input-cell select,
        .input-cell input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            outline: none;
        }

        .input-cell select:focus,
        .input-cell input:focus {
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

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #0078d7;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Create Package</h2>

    <?php if($message != "") { echo "<p class='success'>$message</p>"; } ?>

    <form method="POST" class="form-grid">
        <div class="label-cell">Customer</div>
        <div class="input-cell">
            <select name="customer_id" required>
                <option value="">Select Customer</option>
                <?php while($row = $customers->fetch_assoc()) { ?>
                    <option value="<?php echo $row['customer_id']; ?>">
                        <?php echo $row['name']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="label-cell">Weight (KG)</div>
        <div class="input-cell"><input type="number" step="0.01" name="weight" required></div>

        <div class="label-cell">Source</div>
        <div class="input-cell"><input type="text" name="source" required></div>

        <div class="label-cell">Destination</div>
        <div class="input-cell"><input type="text" name="destination" required></div>

        <button type="submit" name="submit">Create Package</button>
    </form>

    <a href="view_packages.php">View Packages</a>
</div>

</body>
</html>
