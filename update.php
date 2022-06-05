<?php
//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る
//2. $id = POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更

//1. POSTデータ取得
$name   = $_POST['name'];
$jancode   = $_POST['jancode'];
$expirydate  = $_POST['expirydate'];
$quantity    = $_POST['quantity'];
$content = $_POST['content'];
$id = $_POST['id'];

require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成

// ↓ID入れても抜いてもokです。
$stmt = $pdo->prepare('UPDATE
                        item_table
                    SET
                        name = :name,
                        jancode = :jancode,
                        expirydate = :expirydate,
                        quantity = :quantity,
                        content = :content,
                        indate = sysdate()
                    WHERE
                        id = :id;
                        ');

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':jancode', $jancode, PDO::PARAM_STR);
$stmt->bindValue(':expirydate', $expirydate, PDO::PARAM_STR);
$stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('index.php');
}