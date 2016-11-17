<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>電卓</title>
</head>
<body>

<?php
if (isset($_POST["post_data1"])) {
    $number1=$_POST["post_data1"];
} else {
    $number1='';
}
if (isset($_POST["post_data2"])) {
    $number2=$_POST["post_data2"];
} else {
    $number2='';
}
if (isset($_POST["symbol"])) {
    $symbol=$_POST["symbol"];
} else {
    $symbol='';
}

$answer = $number1 - $number2;

if ($symbol == '+') {
    $answer = $number1 + $number2;
} elseif ($symbol == '-') {
$answer = $number1 - $number2;
} elseif ($symbol == '/') {
    $answer = $number1 / $number2;
}elseif ($symbol == '*') {
        $answer = $number1 * $number2;
    }
?>

<form action="calculator.php" method="post">
    <input type="number" name="post_data1">
    <select name="symbol">
        <option value="+">＋</option>
        <option value="-">－</option>
        <option value="*">×</option>
        <option value="/">÷</option>
        </select>

        <input type="number" name="post_data2">
    <input type="submit" value="計算">  = <?php
    echo $answer

?>

    </form>
</body>
</html>
