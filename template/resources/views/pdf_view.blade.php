
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.ticket-container {
    width: 90%;
    max-width: 800px;
    margin: 30px auto;
    border: 2px solid #0096c7;
    border-radius: 10px;
    overflow: hidden;
    background-image: url('tix.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.ticket-header {
    background: #0096c7;
    color: white;
    text-align: center;
    padding: 15px;
}

.ticket-header p {
    margin: 5px 0 0;
    font-size: 16px;
    text-transform: uppercase;
}

.ticket-body {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background: white;
    background-image: url('tix.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.ticket-details {
    width: 100%;
    max-width: 600px;
    border-collapse: collapse;
    text-transform: uppercase;
}

.ticket-details td {
    padding: 5px;
    /* border: 1px solid #ddd; */
    text-align: center;
    font-weight: bold;
}

.ticket-details strong {
    display: block;
    width: 250px;
    color: #495057;
    font-size: 11px;
}

.ticket-details p {
    margin: 8px 0;
    font-size: 16px;
    line-height: 1.5;
}

.ticket-footer {
    background: #bde0fe;
    border-top: 2px dashed #0096c7;
    padding: 20px;
    position: relative;
    height: 150px; 
}

.receipt {
    float: left; 
    width: 70%;

}

.qr-code {
    float: right; 
    /* float: top; */
}

.qr-code img {
    width: 120px;
    height: 120px;
    background-color: #ddd;
    display: block;
    border: 2px solid #0096c7;
    border-radius: 5px;
}


.receipt h2 {
    margin: 0 0 10px;
    color: #0096c7;
    font-size: 20px;
}


.destination {
    position: relative;
    width: 100%;
    text-align: center;
    padding: 40px;
    padding-left: 90px;
}

.destination h1 {
    margin: 0;
    font-size: 24px;
    color: #0077b6;
    text-transform: uppercase;
}

.destination p {
    margin: 5px 0 0;
    font-size: 12px;
    color: #555;
}

.center-table {
    margin: 0 auto;
    width: 100%;
    max-width: 600px;
}

    </style>
</head>
<body>
    <div class="ticket-container">
        <div class="ticket-header">
            <p><strong> Booking Confirmation </strong></p>
        </div>
        <div class="ticket-body">
            <div class="ticket-details">
                    <table>
                        <tr>
                        <td><strong>Name of Guest</strong></td>
                        <td><strong> Ref. Number </strong></td>
                        <td><strong> room/s booked </strong></td>
                        </tr>
                        <tr>
                            <td> JUAN DELA CRUZ </td>
                            <td> 493631</td>
                            <td> COTT, fhall </td>
                        </tr>
                    </table>

                    <div class="destination">
                        <h1>hacienda jensen farm resort</h1>
                        <p>A Nature's Escape for Relaxation and Adventure</p>
                    </div>

                    <table>
                        <tr>
                            <td><strong>Check-In  </strong></td>
                            <td><strong>Check-Out </strong></td>
                            <td><strong> TOTAL AMOUNT </strong></td>
                        </tr>
                            <tr>
                                <td> 01/30/25 </td>
                                <td> 01/31/25 </td>
                                <td> 12,500 </td>
                        </tr>
                    </table>
                 </div>
        </div>
        <div class="ticket-footer">
            <div class="qr-code">
                <img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="Verification QR Code">
            </div>
            <div class="receipt">
                <h2>Receipt</h2>
                <p><strong>Total Amount:</strong> 15,000</p>
                <p><strong>Total Paid:</strong> 15,000</p>
                <p><strong>Mode of Payment:</strong> Online via PayMongo</p>
            </div>
        </div>
    </div>
</body>
</html>
