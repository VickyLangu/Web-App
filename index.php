<?php 

require_once('config/db.php');
    $query = "SELECT COUNT(surname) AS count_surname, AVG(age) AS average_age, MAX(age) AS max_age, MIN(age) AS min_age, 
          (COUNT(CASE WHEN favoritefood LIKE '%Pizza%' THEN 1 END) / COUNT(*)) * 100 AS pizza_percentage, 
          (COUNT(CASE WHEN favoritefood LIKE '%Burger%' THEN 1 END) / COUNT(*)) * 100 AS burger_percentage,
          (COUNT(CASE WHEN favoritefood LIKE '%Chicken%' THEN 1 END) / COUNT(*)) * 100 AS chicken_percentage,
          ROUND(AVG(CASE WHEN response1 = 'Yes' THEN 1 ELSE 0 END) * 100, 1) AS eat_out_percentage,
          ROUND(AVG(CASE WHEN response1 = 'Yes' THEN 1 ELSE 0 END) * 100, 1) AS watch_movies_percentage,
          ROUND(AVG(CASE WHEN response1 = 'Yes' THEN 1 ELSE 0 END) * 100, 1) AS watch_tv_percentage,
          ROUND(AVG(CASE WHEN response1 = 'Yes' THEN 1 ELSE 0 END) * 100, 1) AS listen_radio_percentage 
          FROM account";
    $results = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($results);

$countSurname = $row['count_surname'];
$averageAge = $row['average_age'];
$maxAge = $row['max_age'];
$minAge = $row['min_age'];
$pizzaPercentage = $row['pizza_percentage'];
$burgerPercentage = $row['burger_percentage'];
$chickenPercentage = $row['chicken_percentage'];
$eatOutPercentage = $row['eat_out_percentage'];
$watchMoviesPercentage = $row['watch_movies_percentage'];
$watchTVPercentage = $row['watch_tv_percentage'];
$listenRadioPercentage = $row['listen_radio_percentage'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Document</title>
  <style>
    body {
        background: linear-gradient(-180deg, 
        rgba(255,255,255,0.50) 0%, 
        rgba(0,0,0,0.50) 100%);
      display: block;
        margin: 0 auto;
        border: #000000 solid;
        border-collapse: collapse;
        border-radius: 15px;
        width: 65%;
        
      }
      
      table {
      
        display: block;
        margin: 0 auto;
        width: 80%;
      }

      tr {
        font-weight: bold;
        font-size: 18px;
      }

      button {
        display: block;
        text-align: center;
        margin: 0 auto;
        font-size: 20px;
        font-weight: bold;
        width: 100px;
        padding: 9px;
        border: 3px solid #000000;
        background: #906387;
      }
      button:hover {
        cursor: pointer;
        background: #698474;
        color: white;
      }


      a {
        text-decoration: none;
        color: bisque;
      }

  </style>
</head>
<body>
  <div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div>
                  
                  <table class="center">
                    <thead>
                      <th><h1>Survey Statistics:</h1></th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <p>total number of surveys: <?php echo str_repeat('&nbsp;', 60); ?><?php echo $countSurname; ?></p>
    <p>Average age: <?php echo str_repeat('&nbsp;', 80); ?><?php echo $averageAge; ?></p>
    <p>Oldest person who participated in the survey:<?php echo str_repeat('&nbsp;', 24); ?> <?php echo $maxAge; ?></p>
    <p>Youngest person who participated in the survey : <?php echo str_repeat('&nbsp;', 19); ?><?php echo $minAge; ?></p>


                        </td>
                      </tr>
                      <tr>
                        <td>
    <p>Percentage of people who like Pizza:<?php echo str_repeat('&nbsp;', 40); ?> <?php echo $pizzaPercentage; ?>%</p>
    <p>Percentage of people who like Burger:<?php echo str_repeat('&nbsp;', 37); ?> <?php echo $burgerPercentage; ?>%</p>
    <p>Percentage of people who like Chicken: <?php echo str_repeat('&nbsp;', 34); ?> <?php echo $chickenPercentage; ?>%</p>
    
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <p>Percentage of people who like to eat out: <?php echo str_repeat('&nbsp;', 33); ?> <?php echo $eatOutPercentage; ?>%</p>
    <p>Percentage of people who like to watch movies:<?php echo str_repeat('&nbsp;', 23); ?> <?php echo $watchMoviesPercentage; ?>%</p>
    <p>Percentage of people who like to watch TV:<?php echo str_repeat('&nbsp;', 29); ?> <?php echo $watchTVPercentage; ?>%</p>
    <p>Percentage of people who like to listen to the radio:<?php echo str_repeat('&nbsp;', 15.5); ?> <?php echo $listenRadioPercentage; ?>%</p>

                        </td>
                      </tr>
                    </tbody>
                  </table>
           
      <br>

    
    <button>
          <a href="homepage.html">OK</a>
        </button>
        <br>
                </div>
            </div>
        </div>
    </div>
  </div>
</body>
</html>