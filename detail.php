<?php

/**
 * １．PHP
 * [ここでやりたいこと]
 * まず、クエリパラメータの確認 = GETで取得している内容を確認する
 * イメージは、select.phpで取得しているデータを一つだけ取得できるようにする。
 * →select.phpのPHP<?php ?>の中身をコピー、貼り付け
 * ※SQLとデータ取得の箇所を修正します。
 */

$id = $_GET['id'];

require_once('funcs.php');
$pdo = db_conn();



//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM item_table WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

$view = '';
if ($status === false) {
    sql_error($stmt);
} else {
    $result = $stmt->fetch();
}
?>

<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->


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
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>詳細画面</legend>
                <label>名前：<input type="text" name="name" value="<?= $result['name'] ?>"></label><br>
                <label>JANコード：<input type="text" name="jancode" value="<?= $result['jancode'] ?>"></label><br>
                <label>賞味期限：<input type="text" name="expirydate" value="<?= $result['expirydate'] ?>"></label><br>
                <label>在庫数量：<input type="text" name="quantity" value="<?= $result['quantity'] ?>"></label><br>
                <label>商品詳細<textarea name="content" rows="4" cols="40"><?= $result['content'] ?></textarea></label><br>

                <input type="hidden" name="id" value="<?= $result['id'] ?>"><br>

                <input type="submit" value="更新">
            </fieldset>
        </div>
    </form>
</body>

</html>
