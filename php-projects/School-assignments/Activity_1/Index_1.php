<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jack Vincent Bicera</title>
    </head>
    <body>
        <h1>Jack Vincent Bicera</h1>
            <!-- Basic PHP Syntax -->
        <p>Basic PHP Syntax</p>
        <?php
            echo 'Hello World!';
        ?>
        <hr>
            <!-- Decalaring a Variable -->
        <p>Decalaring a Variable</p>
        <?php
            $text = 'this is a sample text';
            $int = 1232;
            $double = 12.32;
        ?>
        <p>Printing Variables</p>
        <p><?= $text ?></p>
        <p><?= $int ?></p>
        <p><?= $double ?></p>
        <hr>
            <!-- PHP Variables Scope cont. Global Var -->
        <p>Variable with global scope:</p>
        <?php
            $globalvar = ' this is a global variable';
            function myTestfunction()
            {
                echo  'Printing global Variable inside a function' , $globalvar;
            }
            
            mytestfunction();
                echo  'Printing global Variable outside the function ' , $globalvar;
        ?>
        <hr>
            <!-- PHP Variables Scope cont2 Local Variable-->
        <p>Variable with local scope:</p>
        <?php
            function myTest() {
            $localvar = ' this is a local variable';
            echo "<p>Variable x inside function is: $localvar </p>";
            }
            myTest();  
            /* Will display Error */
            echo "<p>Variable x outside function is: $localvar</p>";    
        ?>
        <hr>
            <!-- Print and echo statement -->
        <p>PHP echo and print Statements</p>
        <?php
            echo "<h2>PHP echo and print Statements</h2>";
            echo "Hello world!<br>";
            echo "I'm about to learn PHP!<br>";
            echo "This ", "string ", "was ", "made ", "with multiple parameters." , " this is another parameter";
        ?>
        <hr>
            <!-- Display Variables -->
        <p>Display Variables</p>
        <?php
            $txt1 = "Display Variables";
            $txt2 = "W3Schools.com";
            $int1 = 5;
            $int2 = 4;
            echo "<h2>" . $txt1 . "</h2>";
            echo "Study PHP at " . $txt2 . "<br>";
            echo $int1 + $int2;
        ?>
        <hr>
        <!-- Using Print statement -->
        <p>Print Statements</p>
        <?php
            print "<h2>Print Statements</h2>";
            print "Hello world!<br>";
            print "I'm about to learn PHP!";
            print 'test print PHP PRINt'
        ?>
        <hr>
        <!-- Displaying variable using Print statement -->
        <p>Print Statement displaying variable</p>
        <?php
            $txt1 = "Print Statement displaying variable";
            $txt2 = "TESTING PRINT";
            $x = 5;
            $y = 4;
            print "<h2>" . $txt1 . "</h2>";
            print "Study PHP at " . $txt2 . "<br>";
            print $x + $y;
        ?>   

    </body>
</html>