<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>在庫一覧</h1>

<table border="1">
<tr>
  <th>ID</th>
  <th>商品名</th>
  <th>在庫数</th>
</tr>

<?php foreach ($products as $product): ?>
<tr>
  <td><?= $product['id'] ?></td>
  <td><?= htmlspecialchars($product['name']) ?></td>
  <td><?= $product['stock'] ?></td>
</tr>
<?php endforeach; ?>
</table>

<a href="create.php">商品追加</a>

<?php foreach ($products as $p): ?>
<tr>
  <td><?= $p['id'] ?></td>
  <td><?= htmlspecialchars($p['name']) ?></td>
  <td><?= $p['stock'] ?></td>
  <td>
    <a href="edit.php?id=<?= $p['id'] ?>">編集</a>
    <a href="delete.php?id=<?= $p['id'] ?>">削除</a>
  </td>
</tr>
<?php endforeach; ?>
