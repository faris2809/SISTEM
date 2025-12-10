<!DOCTYPE html>
<html>
<head>
    <title>Kedai Runcit Fayae</title>
    <link rel="stylesheet" href="Style.css">
    <link rel="icon" href="logo.png">
    <style>
        /* Optional quick overview card styles */
        .overview {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 20px 0;
        }
        .card {
            border: 1px solid #ccc;
            padding: 15px 25px;
            text-align: center;
            border-radius: 8px;
            background-color: #f8f8f8;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            min-width: 120px;
        }
    </style>
</head>
<body>
    <h1 align="center">Rekod Inventori Kedai Runcit Fayae</h1>
    
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="generate.php">Generate Report</a></li>
    </ul>

    <?php
    include('config.php');

    // Fetch totals for overview
    $totalItems = 0;
    $totalStock = 0;
    $totalValue = 0;
    $lowStockItems = 0;

    $query = mysqli_query($conn, "SELECT * FROM kedai_runcit");
    while ($row = mysqli_fetch_assoc($query)) {
        $totalItems++;
        $totalStock += $row['bilstok'];
        $totalValue += $row['bilstok'] * $row['harga'];
        if ($row['bilstok'] < 25) $lowStockItems++;
    }
    ?>

    <!-- Overview Cards -->
    <div class="overview">
        <div class="card">
            <h3>Jumlah Barang</h3>
            <p><?php echo $totalItems; ?></p>
        </div>
        <div class="card">
            <h3>Jumlah Stok Keseluruhan</h3>
            <p><?php echo $totalStock; ?></p>
        </div>
        <div class="card">
            <h3>Jumlah Nilai Inventori</h3>
            <p>RM <?php echo number_format($totalValue, 2); ?></p>
        </div>
        <div class="card">
            <h3>Barang Stok Rendah</h3>
            <p><?php echo $lowStockItems; ?></p>
        </div>
    </div>

    <!-- Quick Navigation Buttons -->
    <div style="text-align:center; margin:30px 0;">
        <a href="dashboard.php" style="margin:0 15px;">Lihat Dashboard</a>
        <a href="add.php" style="margin:0 15px;">Tambah Barang Baru</a>
        <a href="generate.php" style="margin:0 15px;">Generate Report</a>
    </div>

    <footer style="text-align:center; margin-top:50px; padding:10px; background:#f1f1f1;">
        Kedai Runcit Fayae &copy; <?php echo date("Y"); ?>
    </footer>
</body>
</html>
