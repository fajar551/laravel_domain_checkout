<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice PDF</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        .invoice-box { max-width: 800px; margin: auto; padding: 30px; border: 1px solid #eee; box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); }
        .invoice-box h1 { margin-bottom: 20px; }
        .table { width: 100%; margin-bottom: 20px; }
        .table th, .table td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>
<div class="invoice-box">
    <h1>Invoice #{{ $order->id }}</h1>
    <p>
        <strong>Nama:</strong> {{ $order->user->name }} <br>
        <strong>Email:</strong> {{ $order->user->email }} <br>
        <strong>Domain:</strong> {{ $order->domain->name }} <br>
        <strong>Total Harga:</strong> Rp {{ number_format($order->total_price, 0, ',', '.') }} <br>
        <strong>Status:</strong> {{ $order->status }}
    </p>

    <h4>Informasi Pembayaran</h4>
    <p>Silakan lakukan pembayaran ke nomor rekening berikut: <strong>663721667321</strong></p>

    <p><strong>BELUM DIBAYAR</strong></p>
</div>
</body>
</html>
