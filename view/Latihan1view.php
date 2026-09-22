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

    <?php
    $i = 1;
    foreach ($datamhs as $mhs) {
        echo $i++ . '. ' . $mhs['nama'] . ' ' . $mhs['nim'] . '<br>';
    }
    ?>

</body>
</html>