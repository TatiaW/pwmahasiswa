<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Mahasiswa</title>
  </head>
  <body>
    <?php 
    include 'koneksi.php';
    include 'menu.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM tbmahasiswa WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    ?>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h5>Edit Data Mahasiswa</h5>
            </div>
            <div class="card-body">
                <form action="update_mhs_aksi.php" method="POST">
                    
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">

                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" name="nim" class="form-control" value="<?= $row['nim']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="<?= $row['nama']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jk" class="form-select">
                            <option value="L" <?= ($row['jk'] == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                            <option value="P" <?= ($row['jk'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="mahasiswa.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>

    <?php 
    } else {
        echo "<div class='container mt-5'>Data tidak ditemukan.</div>";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>