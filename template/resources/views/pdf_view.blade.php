<!DOCTYPE html>
<html>
<head>
    <title>Paradise Resort Booking Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f8ff;
            margin: 40px;
            color: #333;
        }
        
        .receipt-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            position: relative;
        }

        .resort-header {
            text-align: center;
            color: #2c5f7d;
            border-bottom: 3px solid #2c5f7d;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .resort-header h1 {
            font-size: 2.5em;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .qr-section {
            text-align: center;
            margin: 30px 0;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
        }

        .qr-section img {
            border: 2px solid #2c5f7d;
            padding: 10px;
            background: white;
            max-width: 200px;
        }

        .reference-number {
            font-size: 1.2em;
            color: #2c5f7d;
            text-align: center;
            padding: 15px;
            background: #e9f4fb;
            border-radius: 5px;
            margin: 20px 0;
        }

        .resort-footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            color: #666;
        }

        .watermark {
            position: absolute;
            opacity: 0.1;
            font-size: 80px;
            transform: rotate(-30deg);
            pointer-events: none;
            white-space: nowrap;
            color: #2c5f7d;
        }

        .info-section {
            margin: 20px 0;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        dl {
            display: grid;
            grid-template-columns: max-content auto;
            gap: 10px 20px;
        }

        dt {
            font-weight: bold;
            color: #2c5f7d;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <div class="watermark">Paradise Resort</div>
        
        <div class="resort-header">
            <h1>Booking Confirmation</h1>
            <p>Your Tropical Getaway Awaits</p>
        </div>

        <div class="info-section">
            <dl>
                <dt>Check-in Date:</dt>
                <dd>[Check-in Date]</dd>
                
                <dt>Check-out Date:</dt>
                <dd>[Check-out Date]</dd>
                
                <dt>Room Type:</dt>
                <dd>[Room Type]</dd>
            </dl>
        </div>

        <div class="qr-section">
            <h3>Scan to Verify Booking</h3>
            <img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="Verification QR Code">
        </div>

        <p class="reference-number">
            Reference Number: <strong>{{ $referenceNumber }}</strong>
        </p>

        <div class="info-section">
            <dl>
                <dt>Total Amount:</dt>
                <dd>$[Amount]</dd>
                
                <dt>Payment Status:</dt>
                <dd>[Payment Status]</dd>
            </dl>
        </div>

        <div class="resort-footer">
            <p>Thank you for choosing Paradise Resort!</p>
            <p>Contact: reservations@paradiseresort.com | +1 (888) 123-4567</p>
        </div>
    </div>
</body>
</html>