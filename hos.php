<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .main {
            background-color: beige;
            width: 100%;
            height: 220vh;
            padding: 20px;
        }
        table {
            width: 100%;
            border: 2px solid grey;
            border-collapse: collapse;
        }
        th, td {
            border: 2px solid grey;
            padding: 8px;
        }
        .h {
            font-weight: bold;
        }
    </style>
</head>
<body style="color: black;">
    <?php
        include("include/header.php");   
        include("include/connection.php");
        $hospital = $_REQUEST['a'];
        $query = "SELECT * FROM doctor WHERE hospital='$hospital'";
        $res = mysqli_query($connect,$query);
        
        $departmentDescriptions = array(
    "Physiology" => "Physiology is the study of how the body works. It looks at things like how your heart pumps blood, how your lungs help you breathe, and how your muscles move your body. Physiologists want to understand how all the parts of your body function together to keep you healthy.",
    
    "Cardiology" => "Cardiology is all about the heart. Cardiologists are doctors who specialize in taking care of your heart. They help with things like heart attacks, high blood pressure, and problems with your blood vessels. They use tests like EKGs and echocardiograms to see how your heart is doing.",

    "Neurology" => "Neurology is about your brain and nerves. Neurologists are doctors who take care of these parts of your body. They help with conditions like headaches, seizures, and diseases like Alzheimer's and Parkinson's. They use tests like MRIs and nerve tests to figure out what's going on in your brain and nerves.",

    "Orthopedics" => "Orthopedics is all about your bones and muscles. Orthopedic doctors are specialists who help with broken bones, joint problems like arthritis, and sports injuries. They use X-rays and physical exams to see how your bones and muscles are doing.",

    "Oncology" => "Oncology is about cancer. Oncologists are doctors who specialize in treating cancer. They help with things like chemotherapy, radiation, and surgery to remove tumors. They use tests like biopsies and scans to find out if someone has cancer and how to best treat it."
    // Add more department descriptions as needed
);

    ?>

    <div class="main">
        <table>
            <tr>
                <th class="text-center" style="font-size: 40px;" colspan="2">
                    <?php echo $_REQUEST["a"]; ?>
                </th>
            </tr>
            <?php while ($row = mysqli_fetch_array($res)) { ?>
            <tr>
                <td style="width:30%; height: 40vh; border: 2px solid grey;">
                    <h6>Department: <?php echo $row['department'];?></h6>
                    <hr>
                    <h6>Doctor: <?php echo $row['username'];?> </h6>
                    <hr>
                    <h6>Qualification: <?php echo $row['qualification'];?></h6>
                    <hr>
                    <h6>Time Of Availability: <span>24x7</span></h6>
                </td>
                <td style="width:60%; border: 2px solid grey;">
                    <?php                 
                        if (array_key_exists($row['department'], $departmentDescriptions)) {
                            $description = $departmentDescriptions[$row['department']];
                        } else {
                            $description = "No description available.";
                        }
                    ?>
                    <h2 align="center"><?php echo $row['department']; ?></h2>
                    <p><?php echo $description; ?></p>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
