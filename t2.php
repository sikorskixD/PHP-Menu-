<!DOCTYPE document>
<html>
<head>
    <style> /*Style sheet inside HTML to style how everything looks */
        body { /* Style the body */
            font-family: Arial, sans-serif; 
            background-color: #851104;
            text-align: center; 
        }
        .container { /* Create white background for menu appearence*/
            background-color: white;
            padding: 20px;
            display: inline-block;
            margin-bottom: 20px;
        }
        h1{
            color: white;
        }
        h2{
            color: black;
        }
        h3{
            color: white;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
    </style>
</head>
<body>

<h1>Detroit Diner</h1> 



<?php
    //breakfast 5:40 AM- 11:30 AM
    //lunch 11:31 AM - 4:35 PM
    //Dinner 4:36 PM - 5:39 AM
    //Brunch 10:30 AM - 1:45 pm on sunday
    date_default_timezone_set("America/New_York"); //Set timezone
    echo "<h3>It is " . date('h:i A') . " on " . date('F jS, Y') . "</h3>"; //Format time/date
    echo "<h3>Today is " . date('l') . "</h3>"; //Format day of week
?>


<div class="container"> 
<?php //start of php
    function isBrek(){ //Check if it is breakfast
        global $now;
        $begin = strtotime("5:00 AM");
        $end = strtotime("9:30 AM");

        if ($now >= $begin && $now <= $end){
            return true;
        }
        else{
            return false;
        }
    }

    function isLunch(){//Check if it is lunch
        global $now;
        $begin = strtotime("11:31 AM");
        $end = strtotime("4:35 PM");

        if ($now >= $begin && $now <= $end){
            return true;
        }
        else{
            return false;
        }
    }

    function isBrunch(){//Check if it is brunch
        global $now;
        $dayy = date("l"); //Check to see if it is sunday
        $begin = strtotime("10:30 AM");
        $end = strtotime("1:45 PM");

        if ($dayy == "Sunday" && $now >= $begin && $now <= $end){ //Add another condition for dayy == Sunday
            return true;
        }
        else{
            return false;
        }
    }

    function isDinner(){//Check if it is dinner
        global $now;
        $begin = strtotime("4:36 PM");
        $end = strtotime("5:39 AM");

        if ($now >= $begin && $now <= $end){
            return true;
        }
        else{
            return false;
        }
    }

    function doBreakfast(){//Take breakfast text file and convert it to an unorder list
        echo "Now serving breakfast";
        $myFile = fopen("Detroit Diner - Breakfast.txt", "r") or die("Mistake here");//Get file
        $Bmenu = fread($myFile, filesize("Detroit Diner - Breakfast.txt"));//Read file
        fclose($myFile);//Close file
        
        echo "<h2> Breakfast </h2>";

        $Menu1 = explode("\n", $Bmenu); // seperates items into array
        echo "<ul>\n";
        foreach($Menu1 as $t2){//sets items from array to be list items
            echo "<li>$t2</li>\n";
        }
        echo "</ul>\n";
    }

    function doLunch(){//Take lunch text file and convert it to an unorder list
        echo "Now serving lunch";
        $myfile = fopen("Detroit Diner - Lunch.txt", 'r') or die("moose");
        $Lmenu = fread($myfile, filesize("Detroit Diner - Lunch.txt"));
        fclose($myfile);

        echo "<h2> Lunch </h2>";

        $Menu2 = explode("\n", $Lmenu);
        echo "<ul>\n";
        foreach($Menu2 as $t2){
            echo "<li>$t2</li>\n";
        }
        echo "</ul>\n";
    }

    function doDinner(){//Take dinner text file and convert it to an unorder list
        echo "Now serving dinner";
        $myfile = fopen("Detroit Diner - Dinner.txt", 'r') or die("moose");
        $Dmenu = fread($myfile, filesize("Detroit Diner - Dinner.txt"));
        fclose($myfile);

        echo "<h2> Dinner </h2>";

        $Menu3 = explode("\n", $Dmenu);
        echo "<ul>\n";
        foreach($Menu3 as $t3){
            echo "<li>$t3</li>\n";
        }
        echo "</ul>\n";
    }

    function doBrunch(){//Take brunch text file and convert it to an unorder list
        echo "Now serving brunch";
        $myfile = fopen("Detroit Diner - Brunch.txt", 'r') or die("moose");
        $BRmenu = fread($myfile, filesize("Detroit Diner - Brunch.txt"));
        fclose($myfile);

        echo "<h2> Brunch </h2>";

        $Menu4 = explode("\n", $BRmenu);
        echo "<ul>\n";
        foreach($Menu4 as $t4){
            echo "<li>$t4</li>\n";
        }
        echo "</ul>\n";
    }

    $now = time(); //Get time

    if(isBrunch()){ //Perform the check functions and execute functions
        doBrunch();
    }
    else if (isBrek()){
        doBreakfast();
    }
    else if(isLunch()){
        doLunch();
    }
    else{
        doDinner();
    }
?>
</div>
</body>
</html>