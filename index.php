<?php
$result = '';
if (isset($_POST['reset'])){
    $num1 = '';
    $num2 = '';
} elseif (isset($_POST['num1'], $_POST['num2'], $_POST['operator'])) {

    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operator = $_POST['operator'];
    

    switch ($operator) {
        case "+":
            $result = $num1 + $num2;
            break;
        case "-":
            $result = $num1 - $num2;
            break;
        case "×":
            $result = $num1 * $num2;
            break;
        case "÷":
            if ($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                $result = "zero";
            }
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calculator</title>
</head>

<body>
    <div class="container">
        <h3>Calculator</h3>
        <form class="flex form" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="number">
                <input class="clean" type="number" step="any" name="num1" value="<?= $num1 ?>" required>
                <input class="clean" type="number" step="any" name="num2" value="<?= $num2 ?>" required>
                <input class="reset" type="submit" name="reset" value="Reset"  >
            </div>
            <div class="operator">
                <button name="operator" value="+">+</button>
                <button name="operator" value="-">-</button>
                <button name="operator" value="×">×</button>
                <button name="operator" value="÷">÷</button>
            </div>

        </form>
        
        <div class="result" >
            <?php 
            if ($result=="zero"){
                echo "<script type='text/javascript'>alert(`Can't divide by zero.`)</script>";
            } elseif($result) {
                echo "$num1 $operator $num2 
                <p>=</p>
                <p>$result </p>";
            }  
            
            ?>
        </div>
    </div>
</body>

</html>