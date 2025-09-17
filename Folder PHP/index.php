<?php
require_once 'Barang.php';
session_start();

// Initialize listBarang in session
if (!isset($_SESSION['listBarang'])) {
    $_SESSION['listBarang'] = [
        new Barang(1, "LCD Display", "Display", "11AA43FD", "Hitachi", 1000000, "lcd.jpg"),
        new Barang(2, "Oled Display", "Display", "21BC23GD", "Samsung", 2000000, "oled.jpg"),
        new Barang(3, "Keyboard US", "Keyboard", "32BB53US", "Delta", 150000, "keyboard.jpg")
    ];
}

$listBarang =& $_SESSION['listBarang'];
$action = $_GET['action'] ?? '';

function findIndexById($id, $arr) {
    foreach ($arr as $i => $b) if ($b->getId() == $id) return $i;
    return -1;
}

// Handle actions
if ($action === 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check all fields are filled
    if (
        empty($_POST['id']) ||
        empty($_POST['nama']) ||
        empty($_POST['kategori']) ||
        empty($_POST['no_part']) ||
        empty($_POST['manufaktur']) ||
        empty($_POST['harga']) ||
        !isset($_FILES['image_file']) ||
        $_FILES['image_file']['error'] !== UPLOAD_ERR_OK
    ) {
        echo "Semua form wajib diisi!";
    } else {
        // Process the image upload
        $tmpName = $_FILES['image_file']['tmp_name'];
        $originalName = basename($_FILES['image_file']['name']);
        $ext = pathinfo($originalName, PATHINFO_EXTENSION);
        $imageName = uniqid() . "." . $ext;
        move_uploaded_file($tmpName, __DIR__ . "/images/" . $imageName);

        // Create Barang object and save
        $b = new Barang(
            (int)$_POST['id'],
            $_POST['nama'],
            $_POST['kategori'],
            $_POST['no_part'],
            $_POST['manufaktur'],
            (int)$_POST['harga'],
            $imageName
        );
        $listBarang[] = $b;
        header("Location: index.php");
        exit;
    }
}

if ($action === 'update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $idx = findIndexById((int)$_POST['id'], $listBarang);
    if ($idx != -1) {
        $b = $listBarang[$idx];

        // Update fields if not empty
        if (!empty($_POST['nama'])) $b->setNama($_POST['nama']);
        if (!empty($_POST['kategori'])) $b->setKategori($_POST['kategori']);
        if (!empty($_POST['no_part'])) $b->setNoPart($_POST['no_part']);
        if (!empty($_POST['manufaktur'])) $b->setManufaktur($_POST['manufaktur']);
        if (!empty($_POST['harga'])) $b->setHarga((int)$_POST['harga']);

        // Only update image if user selected a new file
        if (isset($_FILES['image_file']) 
            && $_FILES['image_file']['error'] === UPLOAD_ERR_OK 
            && !empty($_FILES['image_file']['name'])) {

            $tmpName = $_FILES['image_file']['tmp_name'];
            $originalName = basename($_FILES['image_file']['name']);
            $ext = pathinfo($originalName, PATHINFO_EXTENSION);
            $imageName = uniqid() . "." . $ext;
            move_uploaded_file($tmpName, __DIR__ . "/images/" . $imageName);

            $b->setImage($imageName);
        }
    }

    header("Location: index.php");
    exit;
}

if ($action === 'delete') {
    $idx = findIndexById((int)$_GET['id'], $listBarang);
    if ($idx != -1) array_splice($listBarang, $idx, 1);
    header("Location: index.php"); exit;
}

?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Barang CRUD</title></head>
<body>
<h1>Menu Barang</h1>

<!-- Show All -->
<h2>Daftar Barang</h2>
<table border="1" cellpadding="5">
<tr>
  <th>ID</th><th>Nama</th><th>Kategori</th><th>No Part</th>
  <th>Manufaktur</th><th>Harga</th><th>Image</th><th>Aksi</th>
</tr>
<?php foreach ($listBarang as $b): ?>
<tr>
  <td><?= $b->getId() ?></td>
  <td><?= htmlspecialchars($b->getNama()) ?></td>
  <td><?= htmlspecialchars($b->getKategori()) ?></td>
  <td><?= htmlspecialchars($b->getNoPart()) ?></td>
  <td><?= htmlspecialchars($b->getManufaktur()) ?></td>
  <td><?= $b->getHarga() ?></td>
  <td>
      <?php if ($b->getImage()) echo "<img src='images/".htmlspecialchars($b->getImage())."' width='60'>"; ?>
  </td>
  <td>
     <a href="?action=edit&id=<?= $b->getId() ?>">Edit</a> |
     <a href="?action=delete&id=<?= $b->getId() ?>" onclick="return confirm('Hapus?')">Hapus</a>
  </td>
</tr>
<?php endforeach; ?>
</table>

<hr>

<!-- Add Form -->
<h2>Tambah Barang</h2>
<form method="post" action="?action=add" enctype="multipart/form-data">
  ID: <input type="number" name="id" required><br>
  Nama: <input type="text" name="nama" required><br>
  Kategori: <input type="text" name="kategori" required><br>
  No Part: <input type="text" name="no_part" required><br>
  Manufaktur: <input type="text" name="manufaktur" required><br>
  Harga: <input type="number" name="harga" required><br>
  Image: <input type="file" name="image_file" accept="image/*" required><br>
  <button type="submit">Tambah</button>
</form>

<?php
// Edit Form
if ($action === 'edit') {
    $id = (int)$_GET['id'];
    $idx = findIndexById($id, $listBarang);
    if ($idx != -1) {
        $b = $listBarang[$idx];
        ?>
        <hr>
        <h2>Edit Barang ID <?= $b->getId() ?></h2>
        <form method="post" action="?action=update" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $b->getId() ?>">

            Nama: <input type="text" name="nama" value="<?= htmlspecialchars($b->getNama()) ?>" required><br>
            Kategori: <input type="text" name="kategori" value="<?= htmlspecialchars($b->getKategori()) ?>" required><br>
            No Part: <input type="text" name="no_part" value="<?= htmlspecialchars($b->getNoPart()) ?>" required><br>
            Manufaktur: <input type="text" name="manufaktur" value="<?= htmlspecialchars($b->getManufaktur()) ?>" required><br>
            Harga: <input type="number" name="harga" value="<?= $b->getHarga() ?>" required><br>
            Replace Image: <input type="file" name="image_file" accept="image/*" required><br>

            <button type="submit">Update</button>
        </form>
        <?php
    }
}
?>
</body>
</html>
