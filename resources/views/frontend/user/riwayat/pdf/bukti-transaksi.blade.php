<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->kode_order }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
            color: #333;
        }

        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 28px;
            margin: 0;
            color: #4f46e5;
            font-weight: 700;
        }

        .header p {
            margin: 5px 0;
            color: #666;
            font-size: 14px;
        }

        .details {
            margin-bottom: 25px;
        }

        .details h2 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #4f46e5;
            font-weight: 600;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 5px;
        }

        .details p {
            margin: 8px 0;
            font-size: 14px;
            color: #555;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }

        .table th,
        .table td {
            border: 1px solid #e9ecef;
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }

        .table th {
            background-color: #f8f9fa;
            color: #4a5568;
            font-weight: 600;
        }

        .table td {
            background-color: #ffffff;
        }

        .total {
            text-align: right;
            font-size: 16px;
            font-weight: 700;
            color: #4f46e5;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 2px solid #e9ecef;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #e9ecef;
            font-size: 14px;
            color: #666;
        }

        .status-card {
            max-width: 350px;
            margin: 20px auto;
            background: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }

        .status-title {
            font-size: 16px;
            font-weight: 600;
            color: #4f46e5;
            margin-bottom: 10px;
        }

        .status-text {
            font-size: 14px;
            font-weight: 500;
            color: #555;
        }

        .status-label {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 5px;
            color: #fff;
            font-weight: 600;
            font-size: 14px;
            background: #4f46e5;
        }

        .status-warning {
            background: #f59e0b;
        }

        .status-success {
            background: #10b981;
        }

        .status-danger {
            background: #ef4444;
        }

        .highlight {
            color: #4f46e5;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <!-- Header -->
        <div class="header">
            <h1>Invoice Pembayaran</h1>
            <p class="invoice-number">Nomor Invoice: <span class="highlight">#{{ $order->kode_order }}</span></p>
            <p class="invoice-date">Tanggal: {{ now()->format('d F Y') }}</p>
        </div>

        <!-- Informasi Pemesan -->
        <div class="details">
            <h2>Informasi Pemesan</h2>
            <p><strong>Nama:</strong> <span class="highlight">{{ Auth::user()->name }}</span></p>
            <p><strong>Email:</strong> <span class="highlight">{{ Auth::user()->email }}</span></p>
        </div>

        <!-- Informasi Order -->
        <div class="details">
            <h2>Informasi Order</h2>
            <p><strong>Nama Travel:</strong> <span class="highlight">{{ $order->nama_travel }}</span></p>
            <p><strong>Tanggal Keberangkatan:</strong> <span class="highlight">{{ $order->tanggal_travel }}</span></p>
            <p><strong>Jam Keberangkatan:</strong> <span class="highlight">{{ $order->jam_travel }}</span></p>
            <p><strong>Asal:</strong> <span class="highlight">{{ $order->asal_travel }}</span></p>
            <p><strong>Tujuan:</strong> <span class="highlight">{{ $order->tujuan_travel }}</span></p>
        </div>

        <!-- Tabel Detail Harga -->
        <table class="table">
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Harga Tiket</td>
                    <td>Rp {{ number_format($order->harga_travel, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Biaya Layanan</td>
                    <td>Rp 10.000</td>
                </tr>
                <tr>
                    <td><strong>Total Pembayaran</strong></td>
                    <td><strong>Rp {{ number_format($order->harga_travel + 10000, 0, ',', '.') }}</strong></td>
                </tr>
            </tbody>
        </table>

        <!-- Status Pembayaran -->
        <div class="status-card">
            <h2 class="status-title">Status Pembayaran</h2>
            <p class="status-text">
                <span class="status-label 
                    {{ $order->status_pembayaraan === 'Menunggu Pembayaran' ? 'status-warning' : 
                       ($order->status_pembayaraan === 'Lunas' ? 'status-success' : 'status-danger') }}">
                    {{ $order->status_pembayaraan }}
                </span>
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Terima kasih telah menggunakan layanan kami.</p>
            <p>&copy; {{ date('Y') }} TravelKu. All rights reserved.</p>
        </div>
    </div>
</body>

</html>