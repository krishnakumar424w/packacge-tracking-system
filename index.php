<!DOCTYPE html>
<html>
<head>
    <title>Package Tracking Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="overlay">

    <header>
        <div class="logo">
            📦 Package Tracking Dashboard
        </div>

        <div class="admin">
            <div class="avatar">A</div>
            Admin ▼
        </div>
    </header>

    <div class="dashboard">

        <!-- LEFT SIDE -->
        <div class="side left">

            <div class="card">
                <div class="title">Customer</div>
                <div class="actions">
                    <a href="add_customer.php" class="btn add">+</a>
                    <a href="view_customers.php" class="btn view">👁</a>
                </div>
            </div>

            <div class="card">
                <div class="title">Agent</div>
                <div class="actions">
                    <a href="add_agent.php" class="btn add">+</a>
                    <a href="view_agents.php" class="btn view">👁</a>
                </div>
            </div>

            <div class="card">
                <div class="title">Package</div>
                <div class="actions">
                    <a href="create_package.php" class="btn add">+</a>
                    <a href="view_packages.php" class="btn view">👁</a>
                </div>
            </div>

            <div class="delivery-card">
                <h3>Estimated Delivery</h3>
                <h2>24 May 2025</h2>

                <div class="status">
                    Status
                    <span>In Transit</span>
                </div>
            </div>

        </div>

        <!-- MAP CENTER -->
        <div class="map-container">

            <img src="map.png" class="map">

            <div class="route"></div>

            <div class="pickup">
                Pickup<br>
                New Delhi
            </div>

            <div class="destination">
                Destination<br>
                Bengaluru
            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="side right">

            <div class="card">
                <div class="title">Assign Agent</div>
                <div class="actions">
                    <a href="assign_agent.php" class="btn add">+</a>
                </div>
            </div>

            <div class="card">
                <div class="title">Tracking</div>
                <div class="actions center">
                    <a href="track_package.php" class="btn view">👁</a>
                </div>
            </div>

            <div class="card">
                <div class="title">Shipment Lifecycle</div>
                <div class="actions center">
                    <a href="update_status.php" class="btn view">👁</a>
                </div>
            </div>
             <div class="card">
                <div class="title">Reports</div>
                <div class="actions center">
                    <a href="reports.php" class="btn view">👁</a>
                </div>
            </div>

        </div>

    </div>

    <!-- TIMELINE -->

    <div class="timeline">

        <div class="step active">
            ✓
            <p>Order Placed</p>
        </div>

        <div class="step active">
            ✓
            <p>Picked Up</p>
        </div>

        <div class="step current">
            🚚
            <p>In Transit</p>
        </div>

        <div class="step">
            ○
            <p>Out For Delivery</p>
        </div>

        <div class="step">
            ○
            <p>Delivered</p>
        </div>

    </div>

</div>

</body>
</html>