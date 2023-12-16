<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tutorial</title>
</head>
<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.container{
    margin: auto;
    padding: 23px;
    max-width: 80%;
    background-color: #f4f4f5;
}
</style>
<body>
    <div class="container">
        <h1>This is container</h1>
        <p>Your party status is here: </p>
      <?php
      $age = 34;
        if($age>18){
            echo "You can go to the party";
        }
        else if($age==7){
            echo "you are 7 years old";
        }
        else if($age==6){
            echo "you are 6 years old";
        }
        else{
            echo "You can not go to the party";
        }
        // *********************
        // // arrays in php
        $langauges = array("Python", "C++", "php", "NodesJs");
        // echo count($langauges);
        // echo $langauges[0];

        // *********************
        // Loops in php
        $a = 0;
        while ($a <= 10){
            echo "<br>The value of a is :";
            echo $a;
            $a++;
        }

        // *********************
        // Iterating arrays in php using while loop
        $a = 0;
        while ($a < count($langauges)) {
            echo "<br>The value of langauges is :";
            echo $langauges[$a];
            $a++;
        }

        //  php using do while loop
        $a = 200;
        do  {
            echo "<br>The value of langauges is :";
            echo $a;
            $a++;

        } while ($a <= 203);

        // for loop in php 
        for ($a=60; $a <= 10; $a++){
            echo "<br> The value of a is ";
            echo $a;
        }

        // for each loop in php 
        foreach ($langauges as $value){
            echo "<br> The value from foreach is ";
            echo $value;
        }

        // Function in php
        function print5(){
            print "FIVE"
        }
        print5()
        print5()
      ?>  
    </div>
</body>
</html>