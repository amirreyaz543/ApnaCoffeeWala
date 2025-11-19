<?php
require_once 'config.php';
require_once 'functions.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type');

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'get_products':
        getProductsAPI();
        break;
    case 'contact':
        contactAPI();
        break;
    case 'add_to_cart':
        addToCartAPI();
        break;
    case 'get_cart':
        getCartAPI();
        break;
    default:
        echo json_encode(['success' => false, 'message' => 'Invalid action']);
        break;
}

function getProductsAPI() {
    global $pdo;
    
    try {
        $category = $_GET['category'] ?? '';
        $search = $_GET['search'] ?? '';
        
        $sql = "SELECT p.*, c.name as category_name FROM products p 
                LEFT JOIN categories c ON p.category_id = c.id 
                WHERE p.status = 'active'";
        
        $params = [];
        
        if ($category) {
            $sql .= " AND c.name = ?";
            $params[] = $category;
        }
        
        if ($search) {
            $sql .= " AND (p.name LIKE ? OR p.description LIKE ?)";
            $searchTerm = "%$search%";
            $params[] = $searchTerm;
            $params[] = $searchTerm;
        }
        
        $sql .= " ORDER BY p.is_featured DESC, p.created_at DESC";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $products = $stmt->fetchAll();
        
        echo json_encode([
            'success' => true,
            'products' => $products
        ]);
    } catch (PDOException $e) {
        error_log("API Error - get_products: " . $e->getMessage());
        echo json_encode([
            'success' => false,
            'message' => 'Failed to fetch products'
        ]);
    }
}

function contactAPI() {
    $data = [
        'name' => $_POST['name'] ?? '',
        'email' => $_POST['email'] ?? '',
        'subject' => $_POST['subject'] ?? '',
        'message' => $_POST['message'] ?? ''
    ];
    
    // Basic validation
    foreach ($data as $key => $value) {
        if (empty($value)) {
            echo json_encode([
                'success' => false,
                'message' => "Please fill in all fields"
            ]);
            return;
        }
    }
    
    // Validate email
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            'success' => false,
            'message' => "Please enter a valid email address"
        ]);
        return;
    }
    
    $result = processContactForm($data);
    
    if ($result) {
        echo json_encode([
            'success' => true,
            'message' => 'Message sent successfully'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Failed to send message'
        ]);
    }
}

function addToCartAPI() {
    session_start();
    
    $product_id = $_POST['product_id'] ?? 0;
    $quantity = $_POST['quantity'] ?? 1;
    
    if ($product_id <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid product']);
        return;
    }
    
    $result = addToCart($product_id, $quantity);
    
    if ($result) {
        echo json_encode([
            'success' => true,
            'cart_count' => array_sum($_SESSION['cart'] ?? []),
            'message' => 'Product added to cart'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Failed to add product to cart'
        ]);
    }
}

function getCartAPI() {
    session_start();
    
    $cart_items = getCartItems();
    $cart_total = getCartTotal();
    
    echo json_encode([
        'success' => true,
        'cart_items' => $cart_items,
        'cart_total' => $cart_total,
        'cart_count' => array_sum($_SESSION['cart'] ?? [])
    ]);
}
?>
