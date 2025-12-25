<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Pembayaran UKT</title>
  </head>
  <body>
    <?php 
    include 'koneksi.php';
    include 'menu.php';

    $id = $_GET['id'];
    
    // Ambil data UKT yang mau diedit
    $sql = "SELECT * FROM tbukt WHERE id_ukt = '$id'";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    ?>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5>Edit Transaksi UKT</h5>
            </div>
            <div class="card-body">
                <form action="update_ukt_aksi.php" method="POST">
                    
                    <input type="hidden" name="id_ukt" value="<?= $data['id_ukt']; ?>">

                    <div class="mb-3">
                        <label class="form-label">Nama Mahasiswa</label>
                        <select name="id_mhs" class="form-select">
                            <?php
                            // Ambil semua mahasiswa untuk dropdown
                            $mhs_sql = "SELECT * FROM tbmahasiswa ORDER BY nama ASC";
                            $mhs_res = $conn->query($mhs_sql);
                            
                            while($m = $mhs_res->fetch_assoc()){
                                // Jika ID mahasiswa di table UKT sama dengan ID di list, tambahkan 'selected'
                                $pilih = ($m['id'] == $data['id_mhs']) ? 'selected' : '';
                                echo "<option value='$m[id]' $pilih>$m[nim] - $m[nama]</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Semester</label>
                        <select name="semester" class="form-select">
                            <option value="1" <?= ($data['semester'] == 1) ? 'selected' : ''; ?>>Semester 1</option>
                            <option value="2" <?= ($data['semester'] == 2) ? 'selected' : ''; ?>>Semester 2</option>
                            <option value="3" <?= ($data['semester'] == 3) ? 'selected' : ''; ?>>Semester 3</option>
                            <option value="4" <?= ($data['semester'] == 4) ? 'selected' : ''; ?>>Semester 4</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Biaya UKT (Rp)</label>
                        <input type="number" name="biaya" class="form-control" value="<?= $data['biaya']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Bayar</label>
                        <input type="date" name="tanggal_bayar" class="form-control" value="<?= $data['tanggal_bayar']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="Lunas" 
                            <?= ($data['status'] == 'Lunas') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Lunas</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="Belum Lunas"
                            <?= ($data['status'] == 'Belum Lunas') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Belum Lunas</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="ukt.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>