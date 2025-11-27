<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Hewan - Padalarang Pet House</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Font dan Style Kustom -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8f9ff, #eef1f9);
            color: #333;
            min-height: 100vh;
        }
        .wrapper {
            max-width: 950px;
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
            margin-bottom: 30px;
        }
        .btn-primary {
            background: #364fc7;
            border: none;
            border-radius: 10px;
            transition: 0.3s;
            font-weight: 500;
        }
        .btn-primary:hover {
            background: #25399e;
            transform: translateY(-2px);
        }
        .table {
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 12px;
            overflow: hidden;
        }
        .table thead {
            background-color: #364fc7;
            color: #fff;
        }
        .table tbody tr:hover {
            background-color: #f0f3ff;
        }
        .btn-warning {
            background-color: #f8b400;
            border: none;
            color: #222;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .btn-warning:hover {
            background-color: #e5a100;
            color: white;
        }
        .btn-danger {
            background-color: #e63946;
            border: none;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .btn-danger:hover {
            background-color: #c92a35;
        }
        footer {
            text-align: center;
            margin-top: 30px;
            color: #666;
            font-size: 0.9rem;
        }
        /* Tambahan animasi halus */
        tr {
            transition: background-color 0.2s ease, transform 0.1s ease;
        }
        tr:hover {
            transform: scale(1.01);
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>🐾 Data Hewan - Padalarang Pet House</h2>

        <div class="d-flex justify-content-end mb-3">
            <a href="tambah.php" class="btn btn-primary shadow-sm">+ Tambah Hewan</a>
        </div>

        <table class="table table-hover text-center align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Hewan</th>
                    <th>Jenis</th>
                    <th>Umur</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM hewan");
                if (mysqli_num_rows($result) == 0) {
                    echo "<tr><td colspan='6' class='text-muted py-4'>Belum ada data hewan 🐶</td></tr>";
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nama_hewan']}</td>
                                <td>{$row['jenis_hewan']}</td>
                                <td>{$row['umur']}</td>
                                <td>{$row['keterangan']}</td>
                                <td>
                                    <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm me-1'>Edit</a>
                                    <a href='hapus.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>
                                </td>
                              </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <footer>
        © <?= date('Y') ?> Padalarang Pet House | Dibuat oleh Leonardo
    </footer>
</body>
</html>
