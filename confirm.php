<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>入力内容確認</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>入力内容確認</h1>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // データの受け取り
    $name     = $_POST["name"];
    $age      = $_POST["age"];
    $phone    = $_POST["phone"];
    $email    = $_POST["email"];
    $address  = $_POST["address"];
    $question = $_POST["question"];
    $gender   = $_POST["gender"];

    // エラーメッセージを溜めるための配列を用意
    $errors = [];

    // 1) 年齢チェック (独立したif)
    if (!is_numeric($age) || $age < 0 || $age > 150) {
        $errors[] = "age:年齢は0から150の間で入力してください。";
    } 

    // 2) 名前チェック (独立したif)
    if (!preg_match("/^[ぁ-んァ-ヶー一-龠a-zA-Z]+$/u", $name)) {
        $errors[] = "name:名前はひらがな、カタカナ、漢字、英字のみ使用できます。";
    } 

    // 3) 電話番号チェック (独立したif)
    if (!preg_match("/^[0-9-]+$/", $phone)) {
        $errors[] = "phone:電話番号は半角数字とハイフンのみ使用できます。";
    } 

    // 4) メールアドレスチェック (独立したif)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "email:メールアドレスの形式が正しくありません。";
    } 

    // 5) 住所チェック (独立したif)
    if (!preg_match("/^[ぁ-んァ-ヶー一-龠a-zA-Z0-9]+$/u", $address)) {
        $errors[] = "address:住所はひらがな、カタカナ、漢字、英字のみ使用できます。";
    } 

    // --- 判定結果の表示 ---

    // もしエラーが1つでもあれば表示
    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>" . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . "</p>";
        }
    } else {
        // エラーがない場合のみ、入力内容を出力
        echo "<p>名前: " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p>年齢: " . htmlspecialchars($age, ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p>電話番号: " . htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p>メールアドレス: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p>住所: " . htmlspecialchars($address, ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p>質問: " . htmlspecialchars($question, ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p>性別: " . htmlspecialchars($gender, ENT_QUOTES, 'UTF-8') . "</p>";
    }
} else {
    echo "<p>データが送信されていません。</p>";
}
?>
    <br>
    <button type="button" onclick="history.back()">戻る</button>
</body>
</html>