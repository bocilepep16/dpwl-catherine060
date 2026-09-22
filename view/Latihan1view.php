<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <style>
        table{
            border-collapse: collapse;
            width: 900px;
        }
        table, th, td{
            border:1px solid black;
        }
        th, td{
            padding:8px;
            text-align:left;
        }
        th{
            background:#f2f2f2;
        }
    </style>
</head>
<body>


    <h2>Daftar Mahasiswa</h2>

    <table>
    <tr>
        <th>NO.</th>
        <th>NIM</th>
        <th>NAMA MAHASISWA</th>
        <th>ALAMAT</th>
        <th>NO. TELP</th>
    </tr>

    <?php
    $i = 1;
    foreach($datamhs as $mhs){
    ?>
    <tr>
        <td><?= $i++; ?></td>
        <td><?= $mhs['nim']; ?></td>
        <td><?= $mhs['nama']; ?></td>
        <td><?= $mhs['alamat']; ?></td>
        <td><?= $mhs['telp']; ?></td>
    </tr>
    <?php } ?>

</table>

</body>
</html>