<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>

<p>Hi {{ $kehadiran->pengguna->nama }},</p>

<p>Maklumat punch in anda:</p>

<ul>
    <li>Tarikh Kehadiran: {{ $kehadiran->tarikh_kehadiran }}</li>
    <li>Masa Masuk: {{ $kehadiran->masa_masuk }}</li>
</ul>

<img src="https://picsum.photos/200/300" alt="Gambar" />

<p>Sekian, terima kasih.</p>
</body>
</html>
