<?php
require 'db.php';
$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM products WHERE id=:id");
$stmt->execute([':id'=>$id]);
$p = $stmt->fetch();
?>

<h1>編集</h1>
<form method="post">
  商品名：<input name="name" value="<?= htmlspecialchars($p['name']) ?>"><br>
  在庫数：<input name="stock" type="number" value="<?= $p['stock'] ?>"><br>
  <button>更新</button>
</form>

<?php
if ($_POST) {
  $stmt = $pdo->prepare(
    "UPDATE products SET name=:name, stock=:stock WHERE id=:id"
  );
  $stmt->execute([
    ':name'=>$_POST['name'],
    ':stock'=>$_POST['stock'],
    ':id'=>$id
  ]);
  header('Location: index.php');
}
?>
