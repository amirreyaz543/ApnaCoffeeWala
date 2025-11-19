<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Sample statistics
$total_products = 6;
$total_categories = 4;
$today_orders = 12;
$today_revenue = 1840;

// Sample data
$recent_orders = [
    ['id' => 1, 'customer_name' => 'Priya Sharma', 'item_count' => 3, 'total_amount' => 185, 'status' => 'completed'],
    ['id' => 2, 'customer_name' => 'Rahul Verma', 'item_count' => 2, 'total_amount' => 140, 'status' => 'preparing'],
    ['id' => 3, 'customer_name' => 'Guest', 'item_count' => 1, 'total_amount' => 25, 'status' => 'pending']
];

$low_stock_products = [
    ['name' => 'Masala Chai', 'stock_quantity' => 8],
    ['name' => 'Samosa', 'stock_quantity' => 5]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Apna Chai Wala Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #e74c3c;
            --primary-dark: #c0392b;
            --secondary: #2ecc71;
            --accent: #f39c12;
            --dark: #2c3e50;
            --light: #ecf0f1;
        }
        
        .sidebar {
            background: var(--dark);
            color: white;
            min-height: 100vh;
            position: fixed;
            width: 250px;
            transition: all 0.3s;
        }
        
        .sidebar .logo {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            border-left: 3px solid transparent;
            transition: all 0.3s;
        }
        
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: white;
            background: rgba(255,255,255,0.1);
            border-left-color: var(--primary);
        }
        
        .sidebar .nav-link i {
            width: 20px;
            margin-right: 10px;
        }
        
        .main-content {
            margin-left: 250px;
            padding: 20px;
            background: #f8f9fa;
            min-height: 100vh;
        }
        
        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border-left: 4px solid var(--primary);
            transition: transform 0.3s;
            position: relative;
            overflow: hidden;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-card.orders { border-left-color: var(--secondary); }
        .stat-card.revenue { border-left-color: var(--accent); }
        .stat-card.categories { border-left-color: #3498db; }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: #6c757d;
            font-weight: 600;
        }
        
        .stat-icon {
            font-size: 3rem;
            opacity: 0.2;
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
        }
        
        .card {
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
        
        .card-header {
            background: white;
            border-bottom: 1px solid #eee;
            font-weight: 600;
        }
        
        .table th {
            border-top: none;
            font-weight: 600;
            color: var(--dark);
        }
        
        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
        }
        
        .badge-pending { background: #fff3cd; color: #856404; }
        .badge-preparing { background: #d1ecf1; color: #0c5460; }
        .badge-ready { background: #d4edda; color: #155724; }
        .badge-completed { background: #d1ecf1; color: #0c5460; }
        .badge-cancelled { background: #f8d7da; color: #721c24; }
        
        .low-stock {
            color: var(--primary);
            font-weight: 600;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .sidebar.active {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <i class="fas fa-mug-hot fa-2x" style="color: var(--primary);"></i>
            <h4 class="mt-2">Apna Chai Wala</h4>
            <small>Admin Panel</small>
        </div>
        
        <nav class="nav flex-column">
            <a class="nav-link active" href="dashboard.php">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a class="nav-link" href="#">
                <i class="fas fa-utensils"></i> Products
            </a>
            <a class="nav-link" href="#">
                <i class="fas fa-list"></i> Categories
            </a>
            <a class="nav-link" href="#">
                <i class="fas fa-shopping-bag"></i> Orders
            </a>
            <a class="nav-link" href="#">
                <i class="fas fa-users"></i> Customers
            </a>
            <a class="nav-link" href="#">
                <i class="fas fa-blog"></i> Blog Posts
            </a>
            <a class="nav-link" href="#">
                <i class="fas fa-cog"></i> Settings
            </a>
            <a class="nav-link" href="logout.php">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </nav>
    </div>
    
    <div class="main-content">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="btn btn-primary d-md-none" type="button" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="navbar-nav ms-auto">
                    <span class="navbar-text me-3">
                        <i class="fas fa-user-circle me-2"></i> Welcome, <?php echo htmlspecialchars($_SESSION['admin_username']); ?>
                    </span>
                    <a href="logout.php" class="btn btn-outline-danger btn-sm">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </div>
        </nav>
        
        <div class="container-fluid mt-4">
            <h1 class="h3 mb-4">Dashboard Overview</h1>
            
            <!-- Statistics Cards -->
            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="stat-card position-relative">
                        <div class="stat-number text-primary"><?php echo $total_products; ?></div>
                        <div class="stat-label">Total Products</div>
                        <i class="fas fa-utensils stat-icon text-primary"></i>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card orders position-relative">
                        <div class="stat-number text-success"><?php echo $today_orders; ?></div>
                        <div class="stat-label">Today's Orders</div>
                        <i class="fas fa-shopping-bag stat-icon text-success"></i>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card revenue position-relative">
                        <div class="stat-number text-warning">₹<?php echo number_format($today_revenue, 2); ?></div>
                        <div class="stat-label">Today's Revenue</div>
                        <i class="fas fa-rupee-sign stat-icon text-warning"></i>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card categories position-relative">
                        <div class="stat-number text-info"><?php echo $total_categories; ?></div>
                        <div class="stat-label">Categories</div>
                        <i class="fas fa-list stat-icon text-info"></i>
                    </div>
                </div>
            </div>
            
            <div class="row g-4">
                <!-- Recent Orders -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Recent Orders</h5>
                            <a href="#" class="btn btn-primary btn-sm">View All</a>
                        </div>
                        <div class="card-body">
                            <?php if (empty($recent_orders)): ?>
                                <p class="text-muted text-center py-4">No orders found</p>
                            <?php else: ?>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Customer</th>
                                                <th>Items</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($recent_orders as $order): ?>
                                            <tr>
                                                <td>#<?php echo str_pad($order['id'], 6, '0', STR_PAD_LEFT); ?></td>
                                                <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                                                <td><?php echo $order['item_count']; ?> items</td>
                                                <td>₹<?php echo number_format($order['total_amount'], 2); ?></td>
                                                <td>
                                                    <span class="badge badge-<?php echo strtolower($order['status']); ?>">
                                                        <?php echo ucfirst($order['status']); ?>
                                                    </span>
                                                </td>
                                                <td><?php echo date('M j, g:i A'); ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <!-- Low Stock Alert -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Low Stock Alert</h5>
                        </div>
                        <div class="card-body">
                            <?php if (empty($low_stock_products)): ?>
                                <p class="text-success text-center py-4">
                                    <i class="fas fa-check-circle me-2"></i>All products are well stocked
                                </p>
                            <?php else: ?>
                                <div class="list-group list-group-flush">
                                    <?php foreach ($low_stock_products as $product): ?>
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1"><?php echo htmlspecialchars($product['name']); ?></h6>
                                            <small class="text-muted">Stock: <?php echo $product['stock_quantity']; ?></small>
                                        </div>
                                        <span class="low-stock">
                                            <i class="fas fa-exclamation-triangle"></i> Low
                                        </span>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="text-center mt-3">
                                    <a href="#" class="btn btn-warning btn-sm">Manage Stock</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Quick Actions -->
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5 class="mb-0">Quick Actions</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <a href="#" class="btn btn-primary">
                                    <i class="fas fa-plus me-2"></i>Add New Product
                                </a>
                                <a href="#" class="btn btn-outline-primary">
                                    <i class="fas fa-list me-2"></i>Manage Categories
                                </a>
                                <a href="#" class="btn btn-outline-success">
                                    <i class="fas fa-shopping-bag me-2"></i>View Orders
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });
    </script>
</body>
</html>
