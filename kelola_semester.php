<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Kelola Semester</title>
</head>
<body>
    <?php 
    include 'koneksi.php';
    include 'menu.php'; 
    
    //Tambah Data
    if(isset($_POST['simpan'])){
        $nama = $_POST['nama_semester'];
        $conn->query("INSERT INTO tbsemester (nama_semester) VALUES ('$nama')");
        echo "<script>alert('Semester berhasil ditambah'); window.location='kelola_semester.php';</script>";
    }

    //Hapus Data
    if(isset($_GET['hapus'])){
        $id = $_GET['hapus'];
        $conn->query("DELETE FROM tbsemester WHERE id_semester='$id'");
        echo "<script>alert('Semester dihapus'); window.location='kelola_semester.php';</script>";
    }

    //Edit Data
    if(isset($_POST['update'])){
        $id = $_POST['id_semester'];
        $nama = $_POST['nama_semester'];
        $conn->query("UPDATE tbsemester SET nama_semester='$nama' WHERE id_semester='$id'");
        echo "<script>alert('Semester diupdate'); window.location='kelola_semester.php';</script>";
    }
    ?>

    <div class="container mt-4">
        <h2>Kelola Data Semester</h2>
        
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">Form Semester</div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['edit'])){
                            $id_edit = $_GET['edit'];
                            $data_edit = $conn->query("SELECT * FROM tbsemester WHERE id_semester='$id_edit'")->fetch_assoc();
                        ?>
                            <form method="POST">
                                <input type="hidden" name="id_semester" value="<?= $data_edit['id_semester'] ?>">
                                <div class="mb-3">
                                    <label>Nama Semester</label>
                                    <input type="text" name="nama_semester" class="form-control" value="<?= $data_edit['nama_semester'] ?>" required>
                                </div>
                                <button type="submit" name="update" class="btn btn-success">Edit</button>
                                <a href="kelola_semester.php" class="btn btn-secondary">Batal</a>
                            </form>
                        <?php } else { ?>
                            <form method="POST">
                                <div class="mb-3">
                                    <label>Nama Semester</label>
                                    <input type="text" name="nama_semester" class="form-control" placeholder="Cth: Semester 5" required>
                                </div>
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Semester</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = $conn->query("SELECT * FROM tbsemester ORDER BY id_semester ASC");
                        while($row = $sql->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama_semester']; ?></td>
                            <td>
                                <a href="kelola_semester.php?edit=<?= $row['id_semester']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="kelola_semester.php?hapus=<?= $row['id_semester']; ?>" onclick="return confirm('Hapus semester ini?')" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>