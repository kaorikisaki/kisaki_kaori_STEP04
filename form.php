<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フォーム入力</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>フォーム入力</h1>
    <form action="conform.php" method="post">
        <label for="name">名前:</label>
        <input type="text" id="name" name="name" required>

        <label for="age">年齢:</label>
        <input type="number" id="age" name="age" required>

        <label for="phone">電話番号:</label>
        <input type="text" id="phone" name="phone" required>

        <label for="email">メールアドレス:</label>
        <input type="email" id="email" name="email" required>

        <label for="address">住所:</label>
        <input type="text" id="address" name="address" required>

        <label for="question">質問:</label>
        <input type="text" id="question" name="question">

        <label for="gender">性別:</label>
        <select id="gender" name="gender">
            <option value="男性">男性</option>
            <option value="女性">女性</option>
            <option value="その他">その他</option>
        </select>

        <button type="submit">送信</button>
    </form>
</body>
</html>