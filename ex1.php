<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Assignment</title>
    <style>
    nav {
      background-color: #fff;
      padding: 10px;
      padding-left: 100px;
      display: flex;
      align-items: center;
    }
    nav h1 {
      color: black;
      font-family: "Open Sans", sans-serif;
    }
    nav ul {
      list-style: none;
      margin: 20;
      padding: 20;
    }
    nav li {
      display: inline-block;
      margin-right: 10px;
    }
    nav a {
      color: black;
      text-decoration: none;
      font-family: "Open Sans", sans-serif;
    }

    .container {
      max-width: 600px;
      margin: 25px auto;
      padding: 20px;
      background-color: #f9f9f9;
      border: 1px solid #dddddd;
      border-radius: 5px;
    }

    h2 {
      font-family: 'Arial', sans-serif;
      font-size: 24px;
      color: #333333;
      margin-bottom: 10px;
    }

    p {
      font-family: 'Arial', sans-serif;
      font-size: 18px;
      color: #666666;
      margin-bottom: 0;
    }
    .footer {
      background-color: #f9f9f9;
      padding: 20px;
      text-align: center;
      font-family: 'Arial', sans-serif;
      font-size: 14px;
      color: #666666;
    }
  </style>
  </head>
  <body>
    <!-- Navbar section -->
    <nav>
    <h1> Salahaldin Hameed </h1>
      <ul>
        <li><a href="#1">1</a></li>
        <li><a href="#2">2</a></li>
        <li><a href="#3">3</a></li>
        <li><a href="#4">4</a></li>
        <li><a href="#5">5</a></li>
        <li><a href="#6">6</a></li>
        <li><a href="#7">7</a></li>
        <li><a href="#8">8</a></li>
        <li><a href="#9">9</a></li>
      </ul>
    </nav>
    <!-- simple paragragh -->
    <div style="background-color: #2196F3; padding: 40px; text-align: center;">
      <p style="font-family: 'Open Sans', sans-serif; font-size: 30px ; color: #fff; margin-bottom: 10px;">
        Welcome to my website to solve the exercises
      </p>
      <p style="font-family: 'Open Sans', sans-serif; font-size: 24px; color: #fff; margin-bottom: 0;">
        Solve first exercises
      </p>
    </div>
    <!-- asnwer -->
    <div class="container" id ="1">
      <h2>Ex 1 : Write a PHP program to check whether the first two characters and last two characters of a give string are same. </h2>
        <p>
          <?php
            $string = "hello";

            $first_ch = substr($string, 0,2);
            $last_ch = substr($string,-2);
            echo "<span style='color: black'> => Input : $string </span>";
            echo "<br>";
            if ($first_ch == $last_ch ) {
              echo " => Output the first character and the last character are same";
            } else {
              echo " => Output the first character and the last character are different";
            }
          ?> 
        </p>
    </div>
    <div class="container" id ="2">
      <h2>Ex 2 : Write a PHP program to check if a given string starts with 'Go' or not. (Don't use "str_starts_with" function) </h2>
        <p>
          <?php
            $string2 = "hello";

            $first_ch = substr($string2, 0,2);
            echo "<span style='color: black'> => Input : $string2 </span>";
            echo "<br>";
            if ($first_ch == "Go" ) {
              echo " => Output the first character is Go";
            } else {
              echo " => Output the first character isn't Go";
            }
          ?> 
        </p>
    </div>
    <div class="container" id ="3">
      <h2>Ex 3 : Write a PHP program to check if a given positive number is a multiple of 3 or a multiple of 7. </h2>
        <p>
          <?php
            $num = 21;
            echo "<span style='color: black'> => Input : $num </span>";
            echo "<br>";
            if($num > 0 && ( $num % 3 == 0 || $num % 7 == 0) ) {
              echo " => Output the number is multiple of 3 or 7";
            } else {
              echo " => Output the number is not multiple of 3 or 7";
            }
          ?> 
        </p>
    </div>
    <div class="container" id ="4">
      <h2>Ex 4 : Write a PHP program to check the largest number among three given numbers. </h2>
        <p>
          <?php
            $num1 = 5;
            $num2 = 20;
            $num3 = 15;
            $large_num = $num1;
            echo "<span style='color: black'> => Input : $num1 , $num2 , $num3 </span>";
            echo "<br>";
            if ($num2 > $large_num) {
              $large_num = $num2;
            }
            
            if($num3 > $large_num){
              $large_num = $num3;
            }
            echo " => Output $large_num " ;
          ?> 
        </p>
    </div>
    <div class="container" id ="5">
      <h2>Ex 5 : Write a PHP program to check which number nearest to the value 100 among two given integers. Return 0 if the two numbers are equal. </h2>
        <p>
          <?php
            $nubmer1 = 40;
            $nubmer2 = 60;
            $diff1 = 100 - $nubmer1;
            $diff2 = 100 - $nubmer2;
            echo "<span style='color: black'> => Input : $nubmer1 , $nubmer2 </span>";
            echo "<br>";
            if($diff1 > $diff2) {
              echo " => Output $nubmer2 ";
            }else if($diff1 < $diff2){
              echo " => Output $nubmer1 ";
            }else {
              echo " => Output 0 " ;
            }
          ?> 
        </p>
    </div>
    <div class="container" id ="6">
      <h2>Ex 6 : Write a PHP program to find the larger value from two positive integer values that is in the range 20-30 inclusive or return 0 if neither is in that range. </h2>
        <p>
          <?php
            $numb1 = 24;
            $numb2 = 29;
            echo "<span style='color: black'> => Input : $numb1 , $numb2 </span>";
            echo "<br>";
            if ($numb1 <= 0 || $numb2 <= 0) {
              echo " => Output 0 ";
            }
            if ($numb1 >= 20 && $numb1 <= 30 && $numb2 >= 20 && $numb2 <= 30) {
              if ($numb1 > $numb2) {
                echo " => Output $numb1 ";
              } else {
                echo " => Output  $numb2";
              }
            }
            
          ?> 
        </p>
    </div>
    <div class="container" id ="7">
      <h2>Ex 7 : Write a PHP program to count the number of occurrences of any digit in a string. </h2>
        <p>
          <?php
            $string_num = "123454678";
            $digit = 4 ; // الرقم الي بدي ابحث عليه عدد التكرارات
            $count = 0;
            echo "<span style='color: black'> => Input : $string_num , and the number is $digit </span>";
            echo "<br>";
            for ($i = 0; $i < strlen($string_num); $i++) {
              if ($string_num[$i] == $digit) {
                $count++;
              }
            }
            echo " => Output $count ";
          ?> 
        </p>
    </div>
    <div class="container" id ="8">
      <h2>Ex 8 : Write a PHP program to return the sum of digits of an integer number. </h2>
        <p>
          <?php
            $numbe = "1234";
            $sum = 0;
            echo "<span style='color: black'> => Input : $numbe </span>";
            echo "<br>";
            for ($i = 0; $i < strlen($numbe); $i++) {
              $sum += $numbe[$i];
            }
            echo " => Output $sum ";
          ?> 
        </p>
    </div>
    <div class="container" id ="9">
      <h2>Ex 9 : Write a PHP program to reverse any string. (Don't use "strrev" function.) </h2>
        <p>
          <?php
            $str = "hello world";
            $reversed = "";
            echo "<span style='color: black'> => Input : $str </span>";
            echo "<br>";
            // strlen -1 عشان اجيب اخر حرف في الكلمة
            // --i عشان ارجع ل الاحرف الي قبله و رح اخزنها في reversed
            for ($i = strlen($str) - 1; $i >= 0; $i--) {
              $reversed .= $str[$i];
            }
            echo " => Output $reversed ";
          ?> 
        </p>
    </div>
    <!-- footer -->
    <footer class="footer">
      <p> Salahaldin Hameed &copy; 2023 </p>
    </footer>
  </body>
</html>
