<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Data Mahasiswa</title>
  </head>
  <body>
    <?php 
    include 'koneksi.php';
    include 'menu.php';
    ?>

    <div class="container mt-4">
        <h2>Data Mahasiswa TRPL-3C</h2>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
            + Tambah Mahasiswa
        </button>

        <table class="table table-bordered table-hover">
            <thead class="table-light">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM tbmahasiswa ORDER BY id DESC";
            $result = $conn->query($sql);
            $no = 1;
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nim']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['jk']; ?></td>
                <td>
                    <a href="edit_mhs.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm" onclick="return confirm('Yakin mau edit?');">Edit</a>
                    <a href="hapus_mhs.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?');">Hapus</a>
                </td>
            </tr>
            <?php 
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>Data kosong</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Mahasiswa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="tambah_mhs_aksi.php" method="POST">
              <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control" required placeholder="Contoh: 2405181018">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jk" class="form-select">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
          </form>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>