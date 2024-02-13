<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kartu antrian</title>
    <style>
        @page {
            size: A6;
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .page-break {
            page-break-after:avoid;
        }

        .queue-card {
            width: 100%;
            height: 100%;
            /* padding: 10px; */
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .queue-card-logo img {
            max-width: 80px;
            height: auto;
            margin-bottom: 20px
        }

        .kartu-antrian-text {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .queue-card-number {
            text-align: center;
            margin-top: 80px;
            margin-bottom: 10px;
        }

        .counter {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .number {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .date {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .ministry {
            font-size: 14px;
            font-weight: bold;
            margin-top: 80px;
        }
    </style>
</head>
<body>
    <div class="queue-card">
        <div class="queue-card-logo">
            <img src="{{ public_path()."/assets/img/logokkp_putih.png" }}" alt="Ministry logo">
        </div>
        <div class="queue-card-header">
            <div class="kartu-antrian-text">KARTU ANTRIAN<br>PELAYANAN LPSPL SORONG<br>DI {{ strtoupper($client->location->lokasi) }}</div>
        </div>
        <div class="queue-card-number">
            <div class="counter">NOMOR ANTRIAN</div>
            <div class="number">{{ $client->service->kode_layanan }} {{ $client->no_antrian }}</div>
        </div>
        <div class="date">Tanggal: {{ \Carbon\Carbon::parse($client->created_at)->format('d-m-Y') }}</div>
        <div class="queue-card-footer">
            <div class="ministry">KEMENTERIAN KELAUTAN DAN PERIKANAN<br>DIREKTORAT JENDERAL<br>PENGELOLAAN KELAUTAN DAN RUANG LAUT<br>LPSPL SORONG</div>
        </div>
    </div>
</body>
</html>
