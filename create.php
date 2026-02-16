<?php require 'db.php'; ?>
<h1>商品追加</h1>
<form method="post">
  商品名：<input name="name" required><br>
  在庫数：<input name="stock" type="number" min="0" required><br>
  <button>登録</button>
</form>

<?php
if ($_POST) {
  $stmt = $pdo->prepare(
    "INSERT INTO products (name, stock) VALUES (:name, :stock)"
  );
  $stmt->execute([
    ':name' => $_POST['name'],
    ':stock' => $_POST['stock']
  ]);
  header('Location: index.php');
}
?>
