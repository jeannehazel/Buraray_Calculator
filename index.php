<?php
$num = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['input'])) {//This line checks if the 'input' field was set in the POST request data sent from the form.
        $num = $_POST['input'];//If the 'input' field was set, this line assigns its value to the variable $num.
    }

    if (isset($_POST['num'])) {//This line checks if the 'num' field was set in the POST request data.
        $input = $_POST['num'];//If the 'num' field was set, this line assigns its value to the variable $input.
        if (preg_match('/^\d*\.?\d*$/', $input)) {//This line uses a regular expression to check if the value of $input is a valid number.
            $num .= $input;//If $input is a valid number, this line appends its value to the $num variable.
        } else {
            $num = "Error";
        }
    }

    if (isset($_POST['op'])) {//This line checks if the 'op' field was set in the POST request data.
        $op = $_POST['op'];//If the 'op' field was set, this line assigns its value to the variable $op.
        if (preg_match('/[\+\-\*\/%]/', $op)) {//This line uses a regular expression to check if the value of $op is a valid arithmetic operator 
            $num .= $op;//If $op is a valid operator, this line appends its value to the $num variable.
        } else {
            $num = "Error";
        }
    }

    if (isset($_POST['equal'])) {//This line checks if the 'equal' field was set in the POST request data.
        $num = evaluateExpression($num);//If the 'equal' field was set, this line calls the evaluateExpression function 
                                        //to evaluate the expression stored in $num
    }

    if (isset($_POST['c'])) {//this line checks if the 'c' field was set in the POST request data.
        $num = "";//If the 'c' field was set, this line clears the value of the $num variable.
    }
}

function evaluateExpression($expression) {//This line defines a function named evaluateExpression that takes an expression as input.
    if ($expression == "=") {//This line checks if the expression is just the "=" sign.
        return "";//If the expression is "=", this line returns an empty string.
    } else {
        return eval('return '.$expression.';');//If the expression is not "=", this line uses 
                                               //the eval function to evaluate the expression and returns the result.
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calculator</title>
    
</head>
<body>
<h1>CALCULATOR</h1>
<div class="calculator">
<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
</head>
<body>
    <div>
        <form id="form" action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="post">
            <?php 
                
                $num = isset($num) ? $num : "";
            ?>
            <input type="text" class="maininput" name="input" value="<?php echo htmlspecialchars($num); ?>" readonly><br><br>
            
            <div>
                <input type="submit" class="btn numbutton" name="num" value="7">
                <input type="submit" class="btn numbutton" name="num" value="8">
                <input type="submit" class="btn numbutton" name="num" value="9">
                <input type="submit" class="btn calbtn" name="op" value="+">
            </div>
            <div>
                <input type="submit" class="btn numbutton" name="num" value="4">
                <input type="submit" class="btn numbutton" name="num" value="5">
                <input type="submit" class="btn numbutton" name="num" value="6">
                <input type="submit" class="btn calbtn" name="op" value="-">
            </div>
            <div>
                <input type="submit" class="btn numbutton" name="num" value="1">
                <input type="submit" class="btn numbutton" name="num" value="2">
                <input type="submit" class="btn numbutton" name="num" value="3">
                <input type="submit" class="btn calbtn" name="op" value="*">
            </div>
            <div>
                <input type="submit" class="btn numbutton" name="num" value="0">
                <input type="submit" class="btn numbutton" name="num" value=".">
                <input type="submit" class="btn c" name="c" value="C">
                <input type="submit" class="btn calbtn" name="op" value="/">
            </div>

            <div>
                <input type="submit" class="equal" name="equal" value="=">
            </div>
        </form>
    </div>
</body>
</html>
