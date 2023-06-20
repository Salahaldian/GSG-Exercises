<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Second Assignment</title>
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
      </ul>
    </nav>
    <!-- simple paragragh -->
    <div style="background-color: #2196F3; padding: 40px; text-align: center;">
      <p style="font-family: 'Open Sans', sans-serif; font-size: 30px ; color: #fff; margin-bottom: 10px;">
        Welcome to my website to solve the exercises
      </p>
      <p style="font-family: 'Open Sans', sans-serif; font-size: 24px; color: #fff; margin-bottom: 0;">
        Solve second exercises
      </p>
    </div>
    <!-- asnwer -->
    <div class="container" id ="1">
      <h2>Ex 1 : Write a PHP function that accepts an array of integers and return a new array after removing odd numbers. </h2>
        <p>
          <?php
            function removeOdd() {
              $array = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
              $newArray = [];
              foreach($array as $value) {
                if ( $value % 2 == 0 ){
                  $newArray[] = $value;
                }
              }
              echo " => Input : ";
              var_dump($array);
              echo "<br>";
              echo "<br>";
              echo " => Output : ";
              return var_dump($newArray); 
            }
            removeOdd();
          ?> 
        </p>
    </div>
    <div class="container" id ="2">
      <h2>Ex 2 : Write a PHP function that accepts an array of strings and return the longest string found in the array, the function should have a 2nd argument that will hold the index of the item that have the longest string in the input array. </h2>
        <p>
          <?php
            function longestString(){
              $arrOfStrings=["salahaldin","ahmad"];
              $longest = ''; // عشان اخزن فيه المتغير الاكبر ، الديفلت تعته سترنج فاضي
              $num = -1; // لتخزين فيه قيمة الاندكس
              for( $i = 0 ; $i < count($arrOfStrings) ; $i++){
                if (strlen($arrOfStrings[$i]) > strlen($longest)) {
                  $longest = $arrOfStrings[$i];
                  $num = $i;
                }
              }
              return  $longest . " and index is : " . $num ;
            }
            echo " => Input : [\"salahaldin\",\"ahmad\"] ";
            echo "<br>";
            echo "<br>";
            echo " => Output : ";
            var_dump(longestString());
          ?> 
        </p>
    </div>
    <div class="container" id ="3">
      <h2>Ex 3 : Write a function that accepts 2 arrays and return a new array that holds the value of multiplying each item in the first array by the corresponding item in the second array. </h2>
        <p>
          <?php
            function multArray() {
              $array1 = [1, 2, 3];
              $array2 = [4, 5, 6, 10];
              $result1 = [];
              
              if (count($array1) > count($array2)) {
                for ($i = 0; $i < count($array1); $i++) {
                  if (isset($array2[$i])) { // if($array2[$i]!=null) طلع الي فيها خطا لمن استخدمتها
                    $result1[$i] = $array2[$i] * $array1[$i];
                  } else {
                    $array2[$i] = 1;
                    $result1[$i] = $array2[$i] * $array1[$i];
                  }
                }
              } else if (count($array1) < count($array2)) {
                for ($i = 0; $i < count($array2); $i++) {
                  if (isset($array1[$i])) { // ($array1[$i]!=null) طلع الي فيها خطا
                    $result1[$i] = $array2[$i] * $array1[$i];
                  } else {
                    $array1[$i] = 1;
                    $result1[$i] = $array2[$i] * $array1[$i];
                  }
                }
              } else {
                for ($i = 0; $i < count($array1); $i++) {
                  $result1[$i] = $array1[$i] * $array2[$i];
                }
              }
              echo " => Input : ";
              var_dump($array1);
              echo "<br>";
              echo "and";
              echo "<br>";  
              var_dump($array2);
              echo "<br>";
              echo "<br>";
              echo " => Output : ";
              return var_dump($result1);
            }
            multArray();
          ?> 
        </p>
    </div>
    <div class="container" id ="4">
      <h2>Ex 4 : Write a function to calculate the factorial of a number (a non-negative integer). The function accepts the number as an argument. </h2>
        <p>
          <?php
            function factorial($n) {
              if ($n < 0) {
                return 0;
              }
              if ($n == 0) {
                return 1;
              }
              return $n * factorial($n - 1);
            }
            echo " => Input : 5 " ;
            echo "<br>";
            echo "<br>";
            echo " => Output : ";
            echo factorial(5);
          ?> 
        </p>
    </div>
    <div class="container" id ="5">
      <h2>Ex 5 : Write a function to check whether a number is prime or not. </h2>
        <p>
          <?php
            function isPrime() {
              $number = 5;
              // if number < 0
              if($number < 0){
                echo " => Input : $number";
                echo "<br>";
                echo "<br>";
                echo " => Output : ";
                var_dump(false);
              }
              // if number 1
              else if($number == 1){
                echo " => Input : $number";
                echo "<br>";
                echo "<br>";
                echo " => Output : ";
                var_dump(false);
              }
              // if nubmer 2
              else if($number == 2){
                echo " => Input : $number";
                echo "<br>";
                echo "<br>";
                echo " => Output : ";
                var_dump(true);
              } else {
                for ($i = 3; $i < sqrt($number); $i++) {
                  if ($number % $i == 0) {
                    echo " => Input : $number";
                    echo "<br>";
                    echo "<br>";
                    echo " => Output : ";
                    var_dump(false);
                  }
                }
                echo " => Input : $number";
                echo "<br>";
                echo "<br>";
                echo " => Output : ";
                var_dump(true);
              }
              
            }
            isPrime();
          ?> 
        </p>
    </div>
    <!-- footer -->
    <footer class="footer">
      <p> Salahaldin Hameed &copy; 2023 </p>
    </footer>
  </body>
</html>
