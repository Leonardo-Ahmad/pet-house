<?php include 'config.php'; ?>
<?php
// Ambil data berdasarkan ID
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM hewan WHERE id = $id");
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Hewan - Padalarang Pet House</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Style seragam dengan index.php & tambah.php -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8f9ff, #eef1f9);
            color: #333;
            min-height: 100vh;
        }
        .wrapper {
            max-width: 900px;
            margin: 50px auto;
            background: #fff;
            padding: 40px 50px;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.08);
        }
        h2 {
            color: #364fc7;
            font-weight: 600;
            text-align: center;
            margin-bottom: 35px;
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
        .btn-primary {
            background-color: #364fc7;
            border: none;
            border-radius: 10px;
            font-weight: 500;
            transition: 0.3s;
        }
        .btn-primary:hover {
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
        <h2>✏️ Edit Data Hewan</h2>

        <form method="POST">
            <div class="mb-3">
                <label for="nama_hewan" class="form-label">Nama Hewan</label>
                <input type="text" name="nama_hewan" id="nama_hewan" value="<?= $data['nama_hewan']; ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jenis_hewan" class="form-label">Jenis Hewan</label>
                <input type="text" name="jenis_hewan" id="jenis_hewan" value="<?= $data['jenis_hewan']; ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="umur" class="form-label">Umur</label>
                <input type="text" name="umur" id="umur" value="<?= $data['umur']; ?>" class="form-control">
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control" rows="3"><?= $data['keterangan']; ?></textarea>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="index.php" class="btn btn-secondary px-4">← Kembali</a>
                <button type="submit" name="update" class="btn btn-primary px-4">Update Data</button>
            </div>
        </form>
    </div>

    <footer>
        © <?= date('Y') ?> Padalarang Pet House • Dibuat oleh Leonardo
    </footer>

<?php
// Proses update data
if (isset($_POST['update'])) {
    $nama = $_POST['nama_hewan'];
    $jenis = $_POST['jenis_hewan'];
    $umur  = $_POST['umur'];
    $ket   = $_POST['keterangan'];

    mysqli_query($conn, "UPDATE hewan SET 
        nama_hewan='$nama',
        jenis_hewan='$jenis',
        umur='$umur',
        keterangan='$ket'
        WHERE id=$id");

    header("Location: index.php");
}
?>
</body>
</html>
