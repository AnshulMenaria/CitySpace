<?php
session_start();
$tips_articles = array(
    array(
        'title' => 'Tip : Stay hydrated',
        'content' => 'Drink plenty of water throughout the day to stay hydrated and maintain good health.'
    ),
    array(
        'title' => 'Tip : Get enough sleep',
        'content' => 'Make sure to get 7-9 hours of quality sleep each night to allow your body to rest and recover.'
    ),
    array(
        'title' => 'Tip : Eat a balanced diet',
        'content' => 'Consume a variety of nutrient-rich foods, including fruits, vegetables, lean proteins, and whole grains.'
    ),
    array(
        'title' => 'Tip : Exercise regularly',
        'content' => 'Engage in regular physical activity to improve cardiovascular health, boost mood, and maintain a healthy weight.'
    ),
    array(
        'title' => 'Tip : Practice stress management',
        'content' => 'Find healthy ways to manage stress, such as meditation, deep breathing exercises, or spending time in nature.'
    ),
    array(
        'title' => 'Article : Benefits of Exercise',
        'content' => 'Regular exercise has numerous benefits, including improved cardiovascular health, increased energy levels, and better mood.'
    ),
    array(
        'title' => 'Article : Importance of a Balanced Diet',
        'content' => 'Eating a balanced diet rich in fruits, vegetables, lean proteins, and whole grains is essential for overall health and wellbeing.'
    ),
    array(
        'title' => 'Article : Tips for Better Sleep',
        'content' => 'Establish a consistent sleep schedule, create a relaxing bedtime routine, and avoid caffeine and electronics before bedtime for better sleep quality.'
    ),
    array(
        'title' => 'Article : Stress Management Techniques',
        'content' => 'Practice mindfulness meditation, yoga, or progressive muscle relaxation to reduce stress levels and promote relaxation.'
    )
    // Add more tips and articles as needed
);

// Shuffle the array to randomize the order
shuffle($tips_articles);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        
        .main{
            width: 100%;
            height: 99vh;

        }
        #one{
            
            width: 100%;
            height: 80%;
            background-image: url(img/One-bg.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        #text{
            position: relative;
            top: 80px;
            
            margin: 0px 300px 0px 20px;
            font-weight: bolder;
        }
        .sec{
            border: 1px solid black;
            width: 100%;
            height: 115%;
            background-color: darkgrey;
        }
    
        #hos{
            width: 90%;
            height: 35vh;
            margin-top: 10px;
        }
        table,td{
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
         
        }
        table{
            width: 95%;
            margin: 10px 0px 0px 25px;
            background-color: rgb(210, 210, 202);
            border: 1px solid black;
        }
        #title{
            font-size: 50px; 
            color: darkslategrey; 
        }
       
        .a1{
            color: darkslategray;
            text-decoration: none;

        }
        .a1 :hover{
            color: white;
        }
        .third{
            border: 1px solid black;
            width: 100%;
            height: 60%;
        }
        .health-tips {
            padding: 20px;
            background-color: #f8f8f8;
        }
        
        .article {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
        }
        
        .article h2 {
            margin-top: 0;
        }
        
        .article p {
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
<div class="main">
    <div id="one"> 
        <?php
            include("include/header.php")
        ?>

        <div id="text">
            <h1>City Space?</h1>
            <p>Your go-to destination for accessing comprehensive information about hospitals in our city. Here, users can explore a wide array of hospitals, their specialized departments, and the availability of skilled medical professionals. Our user-friendly interface ensures effortless browsing, allowing you to discover the perfect healthcare provider for your needs. Additionally, our platform offers personalized accounts, enabling users to securely upload and manage their medical documents.</p>
        </div>
    </div>
    <div class="sec">
           <table>
                <tr>
                    <th colspan="4" style= border: 2px solid grey;"><h1 id="title">Hospitals</h1></th>
                </tr>
          
                <tr>
                    
                <?php
                $count=0;    
                include("include/connection.php");
                    $r=$connect->query("select * from  receptionist");
                    while($row=$r->fetch_array())
                    {
                        if($count==4){
                        echo "</tr><tr>";
                        $count=0;
                        }

          ?>
                
                    <td style=" border: 2px solid grey;">
                        <a href="hos.php?a=<?php echo $row[1]; ?>" class="a1">
                            <img src="Admin/img/<?php echo $row[4]; ?>" alt="" id="hos"><br>
                            <h2><?php echo $row[1]; ?></h2>
                        </a>
                    </td>
                    <?php $count++; } ?>
                </table>
    </div>
    <div class="health-tips">
        <h2>Health Tips and Articles</h2>
        <?php
        $random_tip_index = array_rand($tips_articles);
    
        do {
            $random_article_index = array_rand($tips_articles);
        } while ($random_article_index === $random_tip_index);
    
        $random_tip = $tips_articles[$random_tip_index];
        $random_article = $tips_articles[$random_article_index];
        ?>
        <div class="article">
            <h2><?php echo $random_tip['title']; ?></h2>
            <p><?php echo $random_tip['content']; ?></p>
        </div>
        <div class="article">
            <h2><?php echo $random_article['title']; ?></h2>
            <p><?php echo $random_article['content']; ?></p>
        </div>
    </div>
        <?php
            include("include/footer.php")
        ?>
    </div>
</div>
</body>
</html>