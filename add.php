<?php
require_onece '\htdocs\db_config.php';
$recipe_name = $_POST['recipe_name'];
$howto = $_POST['howto'];
$difficulty = (int) $_POST['difficulty'];
$budget = (int) $_POST['budget'];
try {
    $dbh = new PDO('mysql:host=localhost;dbname=keijiban;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO recipes (recipe_name, difficulty, budget, howto) VALUES (?, ?, ?, ?)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $recipe_name, PDO::PARAM_STR);
    $stmt->bindValue(2, $difficulty, PDO::PARAM_INT);
    $stmt->bindValue(3, $budget, PDO::PARAM_INT);
    $stmt->bindValue(4, $howto, PDO::PARAM_STR);
    $stmt->execute();
    $dbh = null;
    echo "レシピの登録が完了しました。";
    echo "<a href='index.php'>トップページへ戻る</a>";
} catch (PDOException $e) {
    echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
}