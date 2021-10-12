<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK Profile Matching</title>
    <style>
        table{
            margin:10px auto;
            border-collapse: collapse;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 2px;
        }
        tbody tr:nth-child(even)
        {
            background: #E7E7EB;
        }
    </style>
</head>
<body>
<header>
    <table>
        <tr>
            <td><a href="<?php echo base_url(). 'alternatif'; ?>">Alternatif</a></td>
            <td><a href="<?php echo base_url(). 'kriteria'; ?>">Kriteria</a></td>
            <td><a href="<?php echo base_url(). 'subkriteria'; ?>">Sub Kriteria</a></td>
            <td><a href="<?php echo base_url(). 'nilai'; ?>">Nilai Profil Alternatif</a></td>
            <td><a href="<?php echo base_url(). 'perhitungan'; ?>">Perhitungan</a></td>
        </tr>
    </table>
</header>