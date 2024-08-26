<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        /* Styling for the upper section */
        .upper-section {
            padding: 50px;
            background-color: #f2f2f2;
            text-align: center;
           
           
           
        }

        /* Styling for the team section */
        .team-section {
            padding: 50px;
            background-color: #e0e0e0;
        }

        .team-member {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 30px;
        }

        .team-member img {
            width: 150px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .team-member p {
            font-size: 18px;
        }
    </style>
</head>

<body>
<?php 
            include("include/header.php");
        ?>
    <!-- Upper Section -->
    <div class="upper-section">
        <h2>Welcome to Our Company</h2>
        <p>Welcome to our comprehensive hospital directory, your one-stop destination for accessing vital information about hospitals in our city. Our website provides users with a seamless platform to explore a multitude of hospitals, their specialized departments, and the availability of skilled medical professionals.

With our intuitive interface, users can effortlessly browse through a diverse range of hospitals, gaining insights into their services, facilities, and specialties. Whether you're seeking emergency care, specialized treatments, or routine check-ups, our extensive database ensures that you find the perfect healthcare provider to cater to your needs.

Furthermore, we prioritize user convenience by offering personalized accounts, where individuals can securely upload and manage their medical documents. This feature streamlines the process of sharing important information with healthcare providers, facilitating smoother consultations and treatments.

At our hospital website, we are committed to empowering individuals with the knowledge and resources they need to make informed healthcare decisions. Join us today and embark on a journey towards better health and well-being</p>
    </div>

    <!-- Team Section -->
    <div class="team-section">
        <h2>Our Team</h2>

        <!-- Team Members -->
        <div class="team-member">
            <img src="img/Anshul.jpg" alt="Team Member 1">
            <p>Ansul Menaria</p>
        </div>

        <div class="team-member">
            <img src="img/Dharmesh.png" alt="Team Member 2">
            <p>Dharmesh Dangi</p>
        </div>
    </div>
    <?php
            include("include/footer.php")
        ?>
</body>
</html>
