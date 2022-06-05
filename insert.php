<?php
//1. POSTデータ取得
$name   = $_POST['name'];
$jancode   = $_POST['jancode'];
$expirydate  = $_POST['expirydate'];
$quantity    = $_POST['quantity'];
$content = $_POST['content'];

//2. DB接続します
//*** function化する！  *****************
require_once('funcs.php');
$pdo = db_conn();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO 
                        item_table(
                                id, name, jancode, expirydate, quantity, content, indate)
                            VALUES(null, :name, :jancode, :expirydate, :quantity, :content, sysdate());");

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':jancode', $jancode, PDO::PARAM_STR);
$stmt->bindValue(':expirydate', $expirydate, PDO::PARAM_STR);
$stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    sql_error($stmt);
} else {
    //*** function化する！*****************
    redirect('index.php');
}
