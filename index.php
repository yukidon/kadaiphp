<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">登録商品一覧</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="insert.php">
        <div class="jumbotron">
            <fieldset>
            <legend>商品登録</legend>
                <label>商品名：<input type="text" name="name"></label><br>
                <label>JANコード：<input type="text" name="jancode"></label><br>
                <label>賞味期限：<input type="text" name="expirydate"></label><br>
                <label>在庫数量：<input type="text" name="quantity"></label><br>
                <label>商品概要<textarea name="content" rows="4" cols="40"></textarea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>
