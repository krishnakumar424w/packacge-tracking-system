<?php
include 'db.php';
$message = "";

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "INSERT INTO agents(name, phone, email)
            VALUES('$name', '$phone', '$email')";

    if($conn->query($sql) === TRUE) {
        $message = "Agent Registered Successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>

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

    .input-cell input {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
        outline: none;
    }

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

    .link {
        display: block;
        text-align: center;
        margin-top: 15px;
        color: #0078d7;
        text-decoration: none;
        font-weight: bold;
        font-size: 16px;
    }

    .link:hover {
        text-decoration: underline;
    }
</style>

<div class="container">
    <h2>Agent Registration</h2>

    <?php if($message != "") { echo "<p class='success'>$message</p>"; } ?>

    <form method="POST" class="form-grid">
        <div class="label-cell">Agent Name</div>
        <div class="input-cell"><input type="text" name="name" placeholder="Enter Agent Name" required></div>

        <div class="label-cell">Phone</div>
        <div class="input-cell"><input type="text" name="phone" placeholder="Enter Phone Number" required></div>

        <div class="label-cell">Email</div>
        <div class="input-cell"><input type="email" name="email" placeholder="Enter Email Address" required></div>

        <button type="submit" name="submit">Register Agent</button>
    </form>

    <a class="link" href="view_agents.php">View Agents</a>
</div>
