<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
            color: #007bff;
        }
        p {
            margin-bottom: 20px;
            line-height: 1.6;
            text-align: center;
        }
        .contact-info {
            margin-top: 30px;
        }
        .contact-info h2 {
            margin-bottom: 10px;
        }
        .contact-info p {
            margin-bottom: 10px;
            color: #666;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .social-links {
            margin-top: 20px;
            text-align: center;
        }
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #555;
            font-size: 20px;
            transition: color 0.3s;
        }
        .social-links a:hover {
            color: #007bff;
        }
        .divider {
            margin: 20px auto;
            width: 50%;
            height: 1px;
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <?php
    include("include/header.php");
    ?>
    <div class="container">
        <h1>Contact Us</h1>
        <p>Thank you for your interest in contacting us. Please feel free to reach out to us using the information below:</p>
        
        <div class="contact-info">
            <h2>User Support</h2>
            <p>Email: <a href="mailto:support@yourdomain.com">support@yourdomain.com</a></p>
            <p>Phone: <a href="tel:+91987654321">+91 987654321</a></p>
        </div>
        <div class="contact-info">
            <h2>Hospital Support</h2>
            <p>Email: <a href="mailto:bizdev@yourdomain.com">bizdev@yourdomain.com</a></p>
            <p>Phone: <a href="tel:+91987654321">+91 987654321</a></p>
        </div>
        <div class="contact-info">
            <h2>Address</h2>
            <p>123 Main Street, City, State, Zip Code</p>
        </div>
        
        
        <div class="divider"></div>
        <div class="contact-info">
            <h2>Hours of Operation</h2>
            <p>Monday - Friday: 9:00 AM to 5:00 PM (EST)</p>
        </div>
        <!-- You can embed a map here if needed -->
    </div>
    
</body>
</html>
