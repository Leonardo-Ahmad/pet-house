<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Hewan - Padalarang Pet House</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8f9ff, #eef1f9);
            color: #333;
            min-height: 100vh;
        }
        .wrapper {
            max-width: 700px;
            margin: 60px auto;
            background: #fff;
            padding: 40px 50px;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.08);
        }
        h2 {
            color: #364fc7;
            font-weight: 600;
            text-align: center;
            margin-bottom: 30px;
        }
        label {
            font-weight: 500;
            color: #2b2b2b;
        }
        .form-control {
            border-radius: 10px;
            border: 1px solid #d5d9f3;
            box-shadow: none;
        }
        .form-control:focus {
            border-color: #364fc7;
            box-shadow: 0 0 0 0.2rem rgba(54,79,199,0.1);
        }
        .btn-success {
            background-color: #364fc7;
            border: none;
            border-radius: 10px;
            font-weight: 500;
            transition: 0.3s;
        }
        .btn-success:hover {
            background-color: #25399e;
            transform: translateY(-2px);
        }
        .btn-secondary {
            border-radius: 10px;
            font-weight: 500;
        }
        footer {
            text-align: center;
            margin-top: 30px;
            color: #666;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>➕ Tambah Data Hewan</h2>

        <form method="POST">
            <div class="mb-3">
                <label>Nama Hewan</label>
                <input type="text" name="nama_hewan" class="form-control" placeholder="Contoh: Kucing Persia" required>
            </div>
            <div class="mb-3">
                <label>Jenis Hewan</label>
                <input type="text" name="jenis_hewan" class="form-control" placeholder="Contoh: Mamalia" required>
            </div>
            <div class="mb-3">
                <label>Umur</label>
                <input type="text" name="umur" class="form-control" placeholder="Contoh: 2 tahun">
            </div>
            <div class="mb-3">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3" placeholder="Contoh: Sudah divaksin dan aktif bermain"></textarea>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="index.php" class="btn btn-secondary px-4">← Kembali</a>
                <button type="submit" name="submit" class="btn btn-success px-4">Simpan Data</button>
            </div>
        </form>
    </div>

    <footer>
        © <?= date('Y') ?> Padalarang Pet House | Dibuat oleh Leonardo
    </footer>

<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama_hewan'];
    $jenis = $_POST['jenis_hewan'];
    $umur = $_POST['umur'];
    $ket  = $_POST['keterangan'];

    $query = "INSERT INTO hewan (nama_hewan, jenis_hewan, umur, keterangan)
              VALUES ('$nama', '$jenis', '$umur', '$ket')";
    mysqli_query($conn, $query);
    header("Location: index.php");
}
?>
</body>
</html>
