<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Programming 10</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f6fa;
            padding: 30px;
        }

        h2, h3 {
            color: #004F97;
        }

        table {
            border-collapse: collapse;
            width: 380px;
            background: white;
            padding: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            border-radius: 8px;
        }

        td {
            padding: 8px;
        }

        input, select {
            width: 95%;
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background: #004F97;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #003b72;
        }

        .wrapper {
            display: flex;
            gap: 40px;
        }

        .box-title {
            font-weight: bold;
            padding-bottom: 5px;
        }
    </style>
</head>
<body>

<h2>Form Input Tugas PHP</h2>

<div class="wrapper">
    <form method="POST" action="">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
            </tr>

            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="tgl_lahir" required></td>
            </tr>

            <tr>
                <td>Pekerjaan</td>
                <td>
                    <select name="pekerjaan" required>
                        <option value="Manager">Manager</option>
                        <option value="Staff">Staff</option>
                        <option value="Programmer">Programmer</option>
                        <option value="Designer">Designer</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <button type="submit" name="submit">Submit</button>
                </td>
            </tr>
        </table>
    </form>

    <!-- OUTPUT -->
    <table>
        <tr><td class="box-title" colspan="2">Output</td></tr>

        <?php
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $pekerjaan = $_POST['pekerjaan'];

            // Hitung umur
            $today = new DateTime();
            $birthday = new DateTime($tgl_lahir);
            $umur = $today->diff($birthday)->y;

            // Gaji dari pekerjaan
            switch ($pekerjaan) {
                case "Manager":     $gaji = 50000000; break;
                case "Staff":       $gaji = 7000000;  break;
                case "Programmer":  $gaji = 15000000; break;
                case "Designer":    $gaji = 10000000; break;
                default:            $gaji = 0;
            }

            echo "
            <tr><td>Nama</td><td>$nama</td></tr>
            <tr><td>Umur</td><td>$umur tahun</td></tr>
            <tr><td>Pekerjaan</td><td>$pekerjaan</td></tr>
            <tr><td>Gaji</td><td>Rp " . number_format($gaji, 0, ',', '.') . "</td></tr>
            ";
        } else {
            echo "<tr><td colspan='2'>Belum ada data.</td></tr>";
        }
        ?>
    </table>

</div>

</body>
</html>
