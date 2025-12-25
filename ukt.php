<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Pembayaran UKT</title>
</head>
<body>
    <?php 
    include 'koneksi.php';
    include 'menu.php';
    ?>

    <div class="container mt-4">
        <h2>Data Pembayaran UKT</h2>
        
        <div class="card mb-3 mt-3">
            <div class="card-body bg-light">
                <form action="" method="GET" class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label class="col-form-label fw-bold">Filter Semester:</label>
                    </div>
                    <div class="col-auto">
                   <select name="filter_smt" class="form-select" onchange="this.form.submit()">
                        <?php
                        $qry_smt = $conn->query("SELECT * FROM tbsemester ORDER BY id_semester ASC");
                        while($s = $qry_smt->fetch_assoc()){
                            $selected = (isset($_GET['filter_smt']) && $_GET['filter_smt'] == $s['id_semester']) ? 'selected' : '';
                            if(!isset($_GET['filter_smt']) && $s['id_semester'] == 1) $selected = 'selected';
                            
                            echo "<option value='".$s['id_semester']."' $selected>".$s['nama_semester']."</option>";
                        }
                        ?>
                    </select>
                    </div>
                    <div class="col-auto">
                        <a href="ukt.php" class="btn btn-secondary">Reset</a>
                    </div>
                    <div class="col-auto ms-auto">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUKT">
                            + Bayar UKT
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>Semester</th>
                    <th>Biaya</th>
                    <th>Tanggal Bayar</th>
                    <th>Status</th>
                    <th>Aksi</th> </tr>
            </thead>
            <tbody>
            <?php
            if(isset($_GET['filter_smt'])){
                $smt = $_GET['filter_smt'];
            } else {
                $smt = '1';
            }
            $sql = "SELECT tbukt.*, tbmahasiswa.nama, tbmahasiswa.nim 
                    FROM tbukt 
                    JOIN tbmahasiswa ON tbukt.id_mhs = tbmahasiswa.id 
                    WHERE tbukt.semester = '$smt' 
                    ORDER BY tbukt.id_ukt DESC";
            
            $result = $conn->query($sql);
            $no = 1;

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $badge = ($row['status'] == 'Lunas') ? 'bg-success' : 'bg-warning text-dark';
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['nim']; ?></td>
                    <td>Semester <?= $row['semester']; ?></td>
                    <td>Rp <?= number_format($row['biaya'], 0, ',', '.'); ?></td>
                    <td><?= $row['tanggal_bayar']; ?></td>
                    <td><span class="badge <?= $badge; ?>"><?= $row['status']; ?></span></td>
                    
                    <td>
                        <a href="edit_ukt.php?id=<?= $row['id_ukt']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus_ukt.php?id=<?= $row['id_ukt']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data pembayaran ini?')">Hapus</a>
                    </td>
                    </tr>
            <?php 
                }
            } else {
                echo "<tr><td colspan='8' class='text-center'>Belum ada data pembayaran.</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="modalUKT" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Input Pembayaran UKT</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <form action="tambah_ukt_aksi.php" method="POST">
              <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Pilih Mahasiswa</label>
                    <select name="semester" class="form-select" required>
                        <option value="">-- Pilih Semester --</option>
                        <?php
                        $qry_smt_modal = $conn->query("SELECT * FROM tbsemester ORDER BY id_semester ASC");
                        while($sm = $qry_smt_modal->fetch_assoc()){
                            echo "<option value='".$sm['id_semester']."'>".$sm['nama_semester']."</option>";
                        }
                        ?>
                    </select>   
                </div>
                <div class="mb-3">
                    <label class="form-label">Semester</label>
                    <select name="semester" class="form-select">
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Biaya UKT (Rp)</label>
                    <input type="number" name="biaya" class="form-control" value="2500000">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Bayar</label>
                    <input type="date" name="tanggal_bayar" class="form-control" value="<?= date('Y-m-d'); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="Lunas" checked>
                        <label class="form-check-label">Lunas</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="Belum Lunas">
                        <label class="form-check-label">Belum Lunas</label>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
          </form>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>