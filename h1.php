<?php
session_start();


define('SITE_NAME', 'Apna Coffee Wala');
define('SITE_URL', 'http://localhost/ApnaCoffeeWala');


$featured_products = [
    [
        'id' => 1,
        'name' => "Espresso Coffee",
        'description' => "Strong and rich espresso shot made from premium coffee beans.",
        'price' => 40,
        'image' => "https://images.unsplash.com/photo-1509042239860-f550ce710b93?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
        'category' => "Hot Beverages",
        'is_featured' => true
    ],
    [
        'id' => 2,
        'name' => "Iced Coffee",
        'description' => "Chilled coffee with milk and sweetener, perfect for hot days.",
        'price' => 80,
        'image' => "https://images.unsplash.com/photo-1461023058943-07fcbe16d735?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
        'category' => "Cold Beverages",
        'is_featured' => true
    ],
    [
        'id' => 3,
        'name' => "Coffee Burger",
        'description' => "Special burger with coffee-infused sauce and fresh vegetables.",
        'price' => 120,
        'image' => "https://images.unsplash.com/photo-1568901346375-23c9450c58cd?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
        'category' => "Fast Food",
        'is_featured' => true
    ],
    [
        'id' => 4,
        'name' => "Grilled Sandwich",
        'description' => "Toasted sandwich with melted cheese, vegetables, and special sauce.",
        'price' => 60,
        'image' => "https://images.unsplash.com/photo-1528735602780-2552fd46c7af?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
        'category' => "Fast Food",
        'is_featured' => false
    ],
    [
        'id' => 5,
        'name' => "Coffee Shake",
        'description' => "Creamy milkshake with coffee flavor and whipped cream topping.",
        'price' => 120,
        'image' => "https://images.unsplash.com/photo-1572490122747-3968b75cc699?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
        'category' => "Cold Beverages",
        'is_featured' => true
    ],
    [
        'id' => 6,
        'name' => "Coffee Cookies",
        'description' => "Freshly baked cookies with rich coffee flavor and chocolate chips.",
        'price' => 25,
        'image' => "https://images.unsplash.com/photo-1499636136210-6f4ee915583e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
        'category' => "Snacks",
        'is_featured' => false
    ]
];

$categories = [
    [
        'id' => 1,
        'name' => 'Hot Beverages',
        'description' => 'Traditional hot drinks including coffee, tea and more',
        'icon' => 'fas fa-coffee',
        'product_count' => 8
    ],
    [
        'id' => 2,
        'name' => 'Cold Beverages',
        'description' => 'Refreshing cold drinks, shakes and smoothies',
        'icon' => 'fas fa-wine-glass-alt',
        'product_count' => 6
    ],
    [
        'id' => 3,
        'name' => 'Fast Food',
        'description' => 'Quick bites including burgers, sandwiches and pizzas',
        'icon' => 'fas fa-hamburger',
        'product_count' => 12
    ],
    [
        'id' => 4,
        'name' => 'Snacks',
        'description' => 'Light snacks and appetizers',
        'icon' => 'fas fa-cookie',
        'product_count' => 15
    ]
];

$blog_posts = [
    [
        'id' => 1,
        'title' => 'The Art of Brewing Perfect Coffee',
        'excerpt' => 'Learn the traditional method of brewing the perfect cup of coffee with our secret techniques.',
        'image' => 'https://images.unsplash.com/photo-1447933601403-0c6688de566e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
        'author' => 'Admin',
        'category' => 'Recipes',
        'created_at' => '2024-01-15 10:00:00'
    ],
    [
        'id' => 2,
        'title' => 'Why Our Coffee Stands Out',
        'excerpt' => 'Discover the unique brewing process and premium beans that make our coffee special.',
        'image' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
        'author' => 'Admin',
        'category' => 'Coffee',
        'created_at' => '2024-01-10 14:30:00'
    ],
    [
        'id' => 3,
        'title' => 'Top 5 Coffee Pairings',
        'excerpt' => 'Discover the best snacks and desserts that perfectly complement your coffee.',
        'image' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
        'author' => 'Admin',
        'category' => 'Tips',
        'created_at' => '2024-01-05 09:15:00'
    ]
];


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$cart_count = count($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apna Coffee Wala - Premium Coffee & Fast Food</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        
        :root {
            --primary: #8B4513;
            --primary-dark: #654321;
            --secondary: #D2691E;
            --secondary-dark: #A0522D;
            --accent: #F4A460;
            --dark: #2c3e50;
            --darker: #1a252f;
            --light: #ecf0f1;
            --lighter: #f8f9fa;
            --gray: #95a5a6;
            --gray-light: #bdc3c7;
            --white: #ffffff;
            --black: #000000;
            
            --shadow: 0 5px 15px rgba(0,0,0,0.1);
            --shadow-lg: 0 10px 30px rgba(0,0,0,0.15);
            --shadow-sm: 0 2px 10px rgba(0,0,0,0.05);
            
            --border-radius: 12px;
            --border-radius-sm: 8px;
            --border-radius-lg: 20px;
            
            --transition: all 0.3s ease;
            --transition-fast: all 0.15s ease;
            --transition-slow: all 0.5s ease;
        }

        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.7;
            color: var(--dark);
            background: var(--lighter);
            overflow-x: hidden;
        }

        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section-padding {
            padding: 100px 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title {
            font-size: 3rem;
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
            color: var(--darker);
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(45deg, var(--primary), var(--accent));
            border-radius: 2px;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
        }

        
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px;
            border: none;
            border-radius: var(--border-radius);
            font-family: inherit;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: linear-gradient(45deg, var(--primary), var(--primary-dark));
            color: var(--white);
            box-shadow: var(--shadow);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .btn-secondary {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-secondary:hover {
            background: var(--primary);
            color: var(--white);
            transform: translateY(-3px);
        }

        .btn-block {
            display: flex;
            width: 100%;
            justify-content: center;
        }

        
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0,0,0,0.1);
            z-index: 1000;
            transition: var(--transition);
        }

        .header.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: var(--shadow);
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
        }

        .logo i {
            font-size: 2rem;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        .nav-link {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius-sm);
            transition: var(--transition);
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: var(--transition);
            transform: translateX(-50%);
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 80%;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .search-bar {
            display: flex;
            background: var(--lighter);
            border-radius: var(--border-radius);
            overflow: hidden;
            border: 1px solid var(--gray-light);
        }

        .search-bar input {
            border: none;
            padding: 10px 15px;
            background: transparent;
            outline: none;
            width: 200px;
        }

        .search-bar button {
            border: none;
            background: var(--primary);
            color: var(--white);
            padding: 10px 15px;
            cursor: pointer;
            transition: var(--transition);
        }

        .search-bar button:hover {
            background: var(--primary-dark);
        }

        .cart-icon {
            position: relative;
            cursor: pointer;
            padding: 10px;
            border-radius: var(--border-radius-sm);
            transition: var(--transition);
        }

        .cart-icon:hover {
            background: var(--lighter);
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--primary);
            color: var(--white);
            font-size: 0.7rem;
            padding: 2px 6px;
            border-radius: 10px;
            font-weight: 600;
        }

        .menu-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 5px;
        }

        
        .hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, var(--darker) 0%, var(--dark) 100%);
            color: var(--white);
            overflow: hidden;
        }

        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1447933601403-0c6688de566e?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80') center/cover;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(139, 69, 19, 0.9), rgba(101, 67, 33, 0.8));
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-title {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            animation: fadeInUp 1s ease;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 2.5rem;
            color: var(--light);
            animation: fadeInUp 1s ease 0.2s both;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-bottom: 3rem;
            animation: fadeInUp 1s ease 0.4s both;
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 3rem;
            animation: fadeInUp 1s ease 0.6s both;
        }

        .stat {
            text-align: center;
        }

        .stat h3 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            color: var(--accent);
        }

        .stat p {
            color: var(--light);
            margin: 0;
        }

        
        .food-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .food-card {
            background: var(--white);
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
        }

        .food-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .card-image {
            position: relative;
            height: 250px;
            overflow: hidden;
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition-slow);
        }

        .food-card:hover .card-image img {
            transform: scale(1.1);
        }

        .card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: var(--transition);
        }

        .food-card:hover .card-overlay {
            opacity: 1;
        }

        .btn-quick-view {
            background: var(--white);
            color: var(--primary);
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-quick-view:hover {
            transform: scale(1.1);
        }

        .featured-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: linear-gradient(45deg, var(--accent), #e67e22);
            color: var(--white);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .card-content {
            padding: 1.5rem;
        }

        .card-title {
            font-size: 1.4rem;
            margin-bottom: 0.5rem;
            color: var(--darker);
        }

        .card-description {
            color: var(--gray);
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--secondary);
        }

        .btn-add-cart {
            background: var(--primary);
            color: var(--white);
            border: none;
            padding: 10px 20px;
            border-radius: var(--border-radius-sm);
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 5px;
            font-weight: 500;
        }

        .btn-add-cart:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        
        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .category-card {
            background: var(--white);
            padding: 2.5rem 2rem;
            border-radius: var(--border-radius-lg);
            text-align: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
            cursor: pointer;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .category-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, var(--primary), var(--accent));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }

        .category-icon i {
            font-size: 2rem;
            color: var(--white);
        }

        .category-card h3 {
            margin-bottom: 1rem;
            color: var(--darker);
        }

        .category-card p {
            color: var(--gray);
            margin-bottom: 1rem;
        }

        .category-count {
            color: var(--primary);
            font-weight: 600;
            font-size: 0.9rem;
        }

        
        .offers {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            color: var(--white);
        }

        .offer-banner {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .offer-content h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--white);
        }

        .offer-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: var(--light);
        }

        .offer-timer {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .timer-item {
            background: rgba(255,255,255,0.2);
            padding: 1rem;
            border-radius: var(--border-radius);
            text-align: center;
            min-width: 80px;
            backdrop-filter: blur(10px);
        }

        .timer-item span {
            display: block;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .timer-item small {
            font-size: 0.8rem;
            opacity: 0.9;
        }

        .offer-image {
            text-align: center;
        }

        .offer-image img {
            max-width: 100%;
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-lg);
        }

       
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .blog-card {
            background: var(--white);
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .blog-image {
            position: relative;
            height: 250px;
            overflow: hidden;
        }

        .blog-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition-slow);
        }

        .blog-card:hover .blog-image img {
            transform: scale(1.1);
        }

        .blog-date {
            position: absolute;
            top: 20px;
            left: 20px;
            background: var(--primary);
            color: var(--white);
            padding: 10px;
            border-radius: var(--border-radius-sm);
            text-align: center;
            line-height: 1;
        }

        .date-day {
            display: block;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .date-month {
            font-size: 0.8rem;
            text-transform: uppercase;
        }

        .blog-content {
            padding: 2rem;
        }

        .blog-meta {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            color: var(--gray);
        }

        .blog-meta span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .blog-title {
            font-size: 1.4rem;
            margin-bottom: 1rem;
            color: var(--darker);
        }

        .blog-excerpt {
            color: var(--gray);
            margin-bottom: 1.5rem;
        }

        .blog-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: var(--transition);
        }

        .blog-link:hover {
            gap: 10px;
        }

        
        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .about-features {
            margin: 2rem 0;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .feature i {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, var(--primary), var(--accent));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.5rem;
        }

        .feature h4 {
            margin: 0 0 0.5rem 0;
            color: var(--darker);
        }

        .feature p {
            margin: 0;
            color: var(--gray);
        }

        .about-stats {
            display: flex;
            gap: 2rem;
            margin-top: 2rem;
        }

        .about-stats .stat {
            text-align: center;
        }

        .about-stats .stat h3 {
            font-size: 2.5rem;
            color: var(--primary);
            margin: 0;
        }

        .about-stats .stat p {
            margin: 0;
            font-weight: 600;
            color: var(--dark);
        }

        .about-image {
            position: relative;
        }

        .image-frame {
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .image-frame img {
            width: 100%;
            height: auto;
            display: block;
        }

        .experience-badge {
            position: absolute;
            bottom: -20px;
            right: -20px;
            background: linear-gradient(45deg, var(--accent), #e67e22);
            color: var(--white);
            padding: 1.5rem;
            border-radius: var(--border-radius-lg);
            text-align: center;
            box-shadow: var(--shadow);
        }

        .experience-badge span {
            display: block;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .experience-badge small {
            font-size: 0.9rem;
            opacity: 0.9;
        }

       
        .contact-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .contact-card {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.5rem;
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .contact-card:hover {
            transform: translateX(10px);
            box-shadow: var(--shadow);
        }

        .contact-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, var(--primary), var(--accent));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.5rem;
        }

        .contact-card h4 {
            margin: 0 0 0.5rem 0;
            color: var(--darker);
        }

        .contact-card p {
            margin: 0;
            color: var(--gray);
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-link {
            width: 45px;
            height: 45px;
            background: var(--primary);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: var(--transition);
        }

        .social-link:hover {
            transform: translateY(-3px);
            background: var(--primary-dark);
        }

        .contact-form {
            background: var(--white);
            padding: 2.5rem;
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--dark);
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid var(--gray-light);
            border-radius: var(--border-radius-sm);
            font-family: inherit;
            font-size: 1rem;
            transition: var(--transition);
            background: var(--lighter);
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary);
            background: var(--white);
        }

        
        .footer {
            background: var(--darker);
            color: var(--light);
            padding: 80px 0 0;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-section .logo {
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .footer-description {
            color: var(--gray);
            margin-bottom: 2rem;
        }

        .footer-section h4 {
            color: var(--white);
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: var(--gray);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: var(--primary);
            padding-left: 5px;
        }

        .newsletter-form {
            display: flex;
            gap: 0;
            margin-top: 1rem;
        }

        .newsletter-form input {
            flex: 1;
            padding: 12px 15px;
            border: none;
            border-radius: var(--border-radius-sm) 0 0 var(--border-radius-sm);
            outline: none;
        }

        .newsletter-form button {
            background: var(--primary);
            color: var(--white);
            border: none;
            padding: 12px 20px;
            border-radius: 0 var(--border-radius-sm) var(--border-radius-sm) 0;
            cursor: pointer;
            transition: var(--transition);
        }

        .newsletter-form button:hover {
            background: var(--primary-dark);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding: 2rem 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--gray);
        }

        .footer-bottom .footer-links {
            display: flex;
            gap: 2rem;
        }

        .footer-bottom .footer-links a {
            font-size: 0.9rem;
        }

        
        .cart-sidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 400px;
            height: 100vh;
            background: var(--white);
            box-shadow: var(--shadow-lg);
            transition: var(--transition);
            z-index: 1100;
            display: flex;
            flex-direction: column;
        }

        .cart-sidebar.open {
            right: 0;
        }

        .cart-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--gray-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cart-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--gray);
            transition: var(--transition);
        }

        .cart-close:hover {
            color: var(--primary);
        }

        .cart-items {
            flex: 1;
            padding: 1rem;
            overflow-y: auto;
        }

        .cart-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            border-bottom: 1px solid var(--gray-light);
        }

        .cart-item-image {
            width: 60px;
            height: 60px;
            border-radius: var(--border-radius-sm);
            overflow: hidden;
        }

        .cart-item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cart-item-details {
            flex: 1;
        }

        .cart-item-name {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--darker);
        }

        .cart-item-price {
            color: var(--secondary);
            font-weight: 600;
        }

        .cart-item-actions {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .quantity-btn {
            width: 30px;
            height: 30px;
            border: 1px solid var(--gray-light);
            background: var(--lighter);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .quantity-btn:hover {
            background: var(--primary);
            color: var(--white);
        }

        .cart-item-quantity {
            margin: 0 0.5rem;
            font-weight: 600;
        }

        .remove-item {
            color: var(--primary);
            background: none;
            border: none;
            cursor: pointer;
            padding: 5px;
            transition: var(--transition);
        }

        .remove-item:hover {
            color: var(--primary-dark);
        }

        .cart-footer {
            padding: 1.5rem;
            border-top: 1px solid var(--gray-light);
        }

        .cart-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .cart-empty {
            text-align: center;
            padding: 2rem;
            color: var(--gray);
        }

        .cart-empty i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--gray-light);
        }

        
        .notification {
            position: fixed;
            top: 100px;
            right: 20px;
            padding: 1rem 1.5rem;
            background: var(--secondary);
            color: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            z-index: 1300;
            transform: translateX(400px);
            transition: var(--transition);
        }

        .notification.show {
            transform: translateX(0);
        }

        .notification.error {
            background: var(--primary);
        }

        .notification.warning {
            background: var(--accent);
        }

        
        .loading-spinner {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255,255,255,0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: var(--transition);
        }

        .loading-spinner.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid var(--gray-light);
            border-left: 4px solid var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--primary);
            color: var(--white);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            transition: var(--transition);
            display: none;
            z-index: 100;
            box-shadow: var(--shadow);
        }

        .back-to-top:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
        }

        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        
        @media (max-width: 992px) {
            .about-content,
            .contact-content,
            .offer-banner,
            .footer-content {
                grid-template-columns: 1fr;
                gap: 3rem;
            }
            
            .nav-links {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 280px;
                height: calc(100vh - 80px);
                background: var(--white);
                flex-direction: column;
                padding: 2rem;
                box-shadow: var(--shadow-lg);
                transition: var(--transition);
                z-index: 999;
            }
            
            .nav-links.active {
                left: 0;
            }
            
            .menu-toggle {
                display: block;
            }
            
            .cart-sidebar {
                width: 350px;
            }
        }

        @media (max-width: 768px) {
            .section-padding {
                padding: 80px 0;
            }
            
            .section-title {
                font-size: 2.5rem;
            }
            
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .food-grid,
            .category-grid,
            .blog-grid {
                grid-template-columns: 1fr;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .hero-stats,
            .about-stats {
                flex-direction: column;
                gap: 2rem;
            }
            
            .cart-sidebar {
                width: 100%;
                right: -100%;
            }
        }

        @media (max-width: 576px) {
            .section-title {
                font-size: 2rem;
            }
            
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .offer-timer {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .footer-bottom {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
            
            .footer-bottom .footer-links {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    
    <div id="loading" class="loading-spinner">
        <div class="spinner"></div>
    </div>

   
    <header class="header">
        <div class="container">
            <nav class="navbar">
                <div class="logo">
                    <i class="fas fa-mug-hot"></i>
                    <span>Apna Coffee Wala</span>
                </div>
                
                <ul class="nav-links">
                    <li><a href="#home" class="nav-link active">Home</a></li>
                    <li><a href="#menu" class="nav-link">Menu</a></li>
                    <li><a href="#blog" class="nav-link">Blog</a></li>
                    <li><a href="#about" class="nav-link">About</a></li>
                    <li><a href="#contact" class="nav-link">Contact</a></li>
                </ul>

                <div class="nav-actions">
                    <div class="search-bar">
                        <input type="text" id="searchInput" placeholder="Search coffee items...">
                        <button onclick="searchProducts()"><i class="fas fa-search"></i></button>
                    </div>
                    <div class="cart-icon" onclick="toggleCart()">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count"><?php echo $cart_count; ?></span>
                    </div>
                </div>

                <div class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </div>
            </nav>
        </div>
    </header>


    <section class="hero" id="home">
        <div class="hero-background">
            <div class="hero-overlay"></div>
        </div>
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Welcome to <span style="color: #F4A460;">Apna Coffee Wala</span></h1>
                <p class="hero-subtitle">Experience the finest coffee, shakes, and fast food in town. Made with love and premium ingredients.</p>
                <div class="hero-buttons">
                    <a href="#menu" class="btn btn-primary">
                        <i class="fas fa-utensils"></i>
                        View Our Menu
                    </a>
                    <a href="#contact" class="btn btn-secondary">
                        <i class="fas fa-map-marker-alt"></i>
                        Visit Us
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="stat">
                        <h3>500+</h3>
                        <p>Happy Customers</p>
                    </div>
                    <div class="stat">
                        <h3>50+</h3>
                        <p>Menu Items</p>
                    </div>
                    <div class="stat">
                        <h3>5★</h3>
                        <p>Rating</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="featured section-padding" id="menu">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Our Specialties</h2>
                <p class="section-subtitle">Discover our most popular coffee items loved by customers</p>
            </div>
            <div class="food-grid" id="foodGrid">
                <?php foreach($featured_products as $product): ?>
                <div class="food-card" data-category="<?php echo $product['category']; ?>">
                    <div class="card-image">
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                        <div class="card-overlay">
                            <button class="btn-quick-view" onclick="quickView(<?php echo $product['id']; ?>)">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <?php if($product['is_featured']): ?>
                            <div class="featured-badge">
                                <i class="fas fa-star"></i>
                                Featured
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title"><?php echo $product['name']; ?></h3>
                        <p class="card-description"><?php echo $product['description']; ?></p>
                        <div class="card-footer">
                            <div class="price">₹<?php echo $product['price']; ?></div>
                            <button class="btn-add-cart" onclick="addToCart(<?php echo $product['id']; ?>)">
                                <i class="fas fa-plus"></i>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    
    <section class="categories section-padding">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Food Categories</h2>
                <p class="section-subtitle">Explore our wide range of delicious categories</p>
            </div>
            <div class="category-grid">
                <?php foreach($categories as $category): ?>
                <div class="category-card" onclick="filterCategory('<?php echo $category['name']; ?>')">
                    <div class="category-icon">
                        <i class="<?php echo $category['icon']; ?>"></i>
                    </div>
                    <h3><?php echo $category['name']; ?></h3>
                    <p><?php echo $category['description']; ?></p>
                    <span class="category-count"><?php echo $category['product_count']; ?> items</span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    
    <section class="offers section-padding">
        <div class="container">
            <div class="offer-banner">
                <div class="offer-content">
                    <h2>Special Weekend Offer!</h2>
                    <p>Get 20% off on all coffee beverages this weekend. Use code: <strong>COFFEE20</strong></p>
                    <div class="offer-timer">
                        <div class="timer-item">
                            <span id="days">00</span>
                            <small>Days</small>
                        </div>
                        <div class="timer-item">
                            <span id="hours">00</span>
                            <small>Hours</small>
                        </div>
                        <div class="timer-item">
                            <span id="minutes">00</span>
                            <small>Minutes</small>
                        </div>
                        <div class="timer-item">
                            <span id="seconds">00</span>
                            <small>Seconds</small>
                        </div>
                    </div>
                    <button class="btn btn-primary" onclick="scrollToMenu()">Order Now</button>
                </div>
                <div class="offer-image">
                    <img src="https://images.unsplash.com/photo-1572442388796-11668a67e53d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Special Offer">
                </div>
            </div>
        </div>
    </section>

    
    <section class="blog section-padding" id="blog">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Latest from Our Blog</h2>
                <p class="section-subtitle">Discover stories, recipes and coffee tips</p>
            </div>
            <div class="blog-grid">
                <?php foreach($blog_posts as $post): ?>
                <article class="blog-card">
                    <div class="blog-image">
                        <img src="<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>">
                        <div class="blog-date">
                            <span class="date-day"><?php echo date('d', strtotime($post['created_at'])); ?></span>
                            <span class="date-month"><?php echo date('M', strtotime($post['created_at'])); ?></span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="blog-author"><i class="fas fa-user"></i> <?php echo $post['author']; ?></span>
                            <span class="blog-category"><i class="fas fa-tag"></i> <?php echo $post['category']; ?></span>
                        </div>
                        <h3 class="blog-title"><?php echo $post['title']; ?></h3>
                        <p class="blog-excerpt"><?php echo $post['excerpt']; ?></p>
                        <a href="#" class="blog-link">
                            Read More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    
    <section class="about section-padding" id="about">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <div class="section-header" style="text-align: left;">
                        <h2 class="section-title" style="display: inline-block;">About Apna Coffee Wala</h2>
                        <p class="section-subtitle" style="margin-left: 0;">Serving happiness in every cup</p>
                    </div>
                    <p>Founded in the heart of our university campus, Apna Coffee Wala started as a small coffee stall and has grown into the most loved food destination for students and staff alike.</p>
                    
                    <div class="about-features">
                        <div class="feature">
                            <i class="fas fa-leaf"></i>
                            <div>
                                <h4>Fresh Ingredients</h4>
                                <p>Daily sourced fresh ingredients for best quality</p>
                            </div>
                        </div>
                        <div class="feature">
                            <i class="fas fa-clock"></i>
                            <div>
                                <h4>Quick Service</h4>
                                <p>Your order ready in minutes, never late</p>
                            </div>
                        </div>
                        <div class="feature">
                            <i class="fas fa-rupee-sign"></i>
                            <div>
                                <h4>Affordable Prices</h4>
                                <p>Student-friendly prices without compromising quality</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="about-stats">
                        <div class="stat">
                            <h3>3+</h3>
                            <p>Years Experience</p>
                        </div>
                        <div class="stat">
                            <h3>5000+</h3>
                            <p>Happy Customers</p>
                        </div>
                        <div class="stat">
                            <h3>50+</h3>
                            <p>Menu Items</p>
                        </div>
                    </div>
                </div>
                <div class="about-image">
                    <div class="image-frame">
                        <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Our Cafe">
                    </div>
                    <div class="experience-badge">
                        <span>3+ Years</span>
                        <small>Of Excellence</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="contact section-padding" id="contact">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Get In Touch</h2>
                <p class="section-subtitle">We'd love to hear from you</p>
            </div>
            <div class="contact-content">
                <div class="contact-info">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h4>Our Location</h4>
                            <p>Law Gate Near Auto Stand</p>
                        </div>
                    </div>
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <h4>Phone Number</h4>
                            <p>+91 7814874156</p>
                        </div>
                    </div>
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h4>Email Address</h4>
                            <p>info@apnacoffeewala.com</p>
                        </div>
                    </div>
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h4>Opening Hours</h4>
                            <p>Monday - Sunday: 7:00 AM - 11:00 PM</p>
                        </div>
                    </div>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="contact-form">
                    <form id="contactForm" onsubmit="submitContactForm(event)">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Your Name *</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address *</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject *</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-paper-plane"></i>
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="logo">
                        <i class="fas fa-mug-hot"></i>
                        <span>Apna Coffee Wala</span>
                    </div>
                    <p class="footer-description">Best coffee, shakes and fast food in town. Experience the taste of premium coffee with modern twist.</p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#menu">Menu</a></li>
                        <li><a href="#blog">Blog</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Categories</h4>
                    <ul class="footer-links">
                        <li><a href="#">Hot Beverages</a></li>
                        <li><a href="#">Cold Beverages</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Snacks</a></li>
                        <li><a href="#">Desserts</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Newsletter</h4>
                    <p>Subscribe to get updates on offers</p>
                    <form class="newsletter-form" onsubmit="subscribeNewsletter(event)">
                        <input type="email" placeholder="Enter your email" required>
                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 Apna Coffee Wala. All rights reserved.</p>
                <div class="footer-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    
    <div class="cart-sidebar" id="cartSidebar">
        <div class="cart-header">
            <h3>Your Order</h3>
            <button class="cart-close" onclick="toggleCart()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="cart-items" id="cartItems">
            <div class="cart-empty">
                <i class="fas fa-shopping-cart"></i>
                <p>Your cart is empty</p>
                <button class="btn btn-primary" onclick="scrollToMenu()">Browse Menu</button>
            </div>
        </div>
        <div class="cart-footer">
            <div class="cart-total">
                <span>Total:</span>
                <span id="cartTotal">₹0</span>
            </div>
            <button class="btn btn-primary btn-block" onclick="checkout()">
                <i class="fas fa-shopping-bag"></i>
                Proceed to Checkout
            </button>
        </div>
    </div>

    
    <div class="notification" id="notification"></div>

    
    <button class="back-to-top" id="backToTop">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script>
        
        const products = <?php echo json_encode($featured_products); ?>;
        let cart = <?php echo json_encode($_SESSION['cart']); ?>;

        
        document.addEventListener('DOMContentLoaded', function() {
            initApp();
        });

        function initApp() {
            
            startCountdown();
            
            
            window.addEventListener('scroll', toggleBackToTop);
            
            
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            
            document.querySelector('.menu-toggle').addEventListener('click', function() {
                document.querySelector('.nav-links').classList.toggle('active');
            });

            
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', function() {
                    document.querySelector('.nav-links').classList.remove('active');
                });
            });

            
            window.addEventListener('scroll', function() {
                const header = document.querySelector('.header');
                if (window.scrollY > 100) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });

            
            document.getElementById('searchInput').addEventListener('input', function(e) {
                searchProducts(e.target.value);
            });

            
            setTimeout(() => {
                const loadingSpinner = document.getElementById('loading');
                loadingSpinner.classList.add('hidden');
                setTimeout(() => {
                    loadingSpinner.style.display = 'none';
                }, 500);
            }, 1000);
        }

        function startCountdown() {
            const countdownDate = new Date();
            countdownDate.setDate(countdownDate.getDate() + 3); 

            function updateCountdown() {
                const now = new Date().getTime();
                const distance = countdownDate - now;

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById('days').textContent = days.toString().padStart(2, '0');
                document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
                document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
                document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');

                if (distance < 0) {
                    clearInterval(countdownTimer);
                }
            }

            updateCountdown();
            const countdownTimer = setInterval(updateCountdown, 1000);
        }

        function toggleBackToTop() {
            const backToTop = document.getElementById('backToTop');
            if (window.pageYOffset > 300) {
                backToTop.style.display = 'block';
            } else {
                backToTop.style.display = 'none';
            }
        }

        document.getElementById('backToTop').addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        function searchProducts(query) {
            const foodGrid = document.getElementById('foodGrid');
            if (!query.trim()) {
                displayProducts(products);
                return;
            }

            const filteredProducts = products.filter(product =>
                product.name.toLowerCase().includes(query.toLowerCase()) ||
                product.description.toLowerCase().includes(query.toLowerCase()) ||
                product.category.toLowerCase().includes(query.toLowerCase())
            );

            displayProducts(filteredProducts);
        }

        function displayProducts(productsToShow) {
            const foodGrid = document.getElementById('foodGrid');
            foodGrid.innerHTML = '';
            
            productsToShow.forEach(product => {
                const productCard = `
                    <div class="food-card" data-category="${product.category}">
                        <div class="card-image">
                            <img src="${product.image}" alt="${product.name}">
                            <div class="card-overlay">
                                <button class="btn-quick-view" onclick="quickView(${product.id})">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            ${product.is_featured ? `
                                <div class="featured-badge">
                                    <i class="fas fa-star"></i>
                                    Featured
                                </div>
                            ` : ''}
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">${product.name}</h3>
                            <p class="card-description">${product.description}</p>
                            <div class="card-footer">
                                <div class="price">₹${product.price}</div>
                                <button class="btn-add-cart" onclick="addToCart(${product.id})">
                                    <i class="fas fa-plus"></i>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                foodGrid.innerHTML += productCard;
            });
        }

        function addToCart(productId) {
            const product = products.find(p => p.id === productId);
            if (!product) return;

            
            if (cart[productId]) {
                cart[productId].quantity += 1;
            } else {
                cart[productId] = {
                    ...product,
                    quantity: 1
                };
            }

            
            updateCartSession();
            
            
            updateCartCount();
            loadCart();
            showNotification(`${product.name} added to cart!`, 'success');
            
            
            if (document.getElementById('cartSidebar').classList.contains('open')) {
                loadCart();
            }
        }

        function removeFromCart(productId) {
            delete cart[productId];
            updateCartSession();
            updateCartCount();
            loadCart();
            showNotification('Item removed from cart', 'warning');
        }

        function updateCartQuantity(productId, change) {
            if (cart[productId]) {
                cart[productId].quantity += change;
                
                if (cart[productId].quantity <= 0) {
                    removeFromCart(productId);
                    return;
                }
                
                updateCartSession();
                loadCart();
            }
        }

        function updateCartSession() {
            
            console.log('Cart updated:', cart);
        }

        function loadCart() {
            const cartItems = document.getElementById('cartItems');
            const cartTotal = document.getElementById('cartTotal');
            
            const cartArray = Object.values(cart);
            
            if (cartArray.length === 0) {
                cartItems.innerHTML = `
                    <div class="cart-empty">
                        <i class="fas fa-shopping-cart"></i>
                        <p>Your cart is empty</p>
                        <button class="btn btn-primary" onclick="scrollToMenu()">Browse Menu</button>
                    </div>
                `;
                cartTotal.textContent = '0';
                return;
            }

            let total = 0;
            cartItems.innerHTML = cartArray.map(item => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;
                
                return `
                    <div class="cart-item">
                        <div class="cart-item-image">
                            <img src="${item.image}" alt="${item.name}">
                        </div>
                        <div class="cart-item-details">
                            <div class="cart-item-name">${item.name}</div>
                            <div class="cart-item-price">₹${item.price}</div>
                        </div>
                        <div class="cart-item-actions">
                            <button class="quantity-btn" onclick="updateCartQuantity(${item.id}, -1)">-</button>
                            <span class="cart-item-quantity">${item.quantity}</span>
                            <button class="quantity-btn" onclick="updateCartQuantity(${item.id}, 1)">+</button>
                            <button class="remove-item" onclick="removeFromCart(${item.id})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                `;
            }).join('');

            cartTotal.textContent = total.toFixed(2);
        }

        function updateCartCount() {
            const cartArray = Object.values(cart);
            const totalItems = cartArray.reduce((sum, item) => sum + item.quantity, 0);
            const cartCount = document.querySelector('.cart-count');
            if (cartCount) {
                cartCount.textContent = totalItems;
                cartCount.style.display = totalItems > 0 ? 'block' : 'none';
            }
        }

        function toggleCart() {
            const cartSidebar = document.getElementById('cartSidebar');
            cartSidebar.classList.toggle('open');
            
            if (cartSidebar.classList.contains('open')) {
                loadCart();
            }
        }

        function quickView(productId) {
            const product = products.find(p => p.id === productId);
            if (!product) return;

            showNotification(`Quick view for ${product.name} would open here!`, 'success');
        }

        function filterCategory(category) {
            const filteredProducts = category === 'all' 
                ? products 
                : products.filter(product => product.category === category);
            
            displayProducts(filteredProducts);
            
            
            document.querySelectorAll('.category-card').forEach(card => {
                card.classList.remove('active');
            });
            event.currentTarget.classList.add('active');
        }

        function scrollToMenu() {
            document.getElementById('menu').scrollIntoView({ 
                behavior: 'smooth' 
            });
        }

        function submitContactForm(e) {
            e.preventDefault();
            showNotification('Thank you for your message! We will get back to you soon.', 'success');
            document.getElementById('contactForm').reset();
        }

        function subscribeNewsletter(e) {
            e.preventDefault();
            showNotification('Thank you for subscribing to our newsletter!', 'success');
            e.target.reset();
        }

        function checkout() {
            const cartArray = Object.values(cart);
            
            if (cartArray.length === 0) {
                showNotification('Your cart is empty!', 'warning');
                return;
            }

            const total = cartArray.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            
            
            showNotification(`Order placed successfully! Total: ₹${total.toFixed(2)}`, 'success');
            
            
            cart = {};
            updateCartSession();
            updateCartCount();
            loadCart();
            toggleCart();
        }

        function showNotification(message, type = 'success') {
            const notification = document.getElementById('notification');
            notification.textContent = message;
            notification.className = `notification ${type} show`;
            
            setTimeout(() => {
                notification.classList.remove('show');
            }, 3000);
        }
    </script>
</body>
</html>