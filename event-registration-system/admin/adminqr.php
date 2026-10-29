<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Attendance Scanner - Admin Portal</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; margin: 0; padding: 0; }
        .header { background: #222; color: #fff; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
        .container { max-width: 900px; margin: 30px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
        h3 { border-bottom: 2px solid #eee; padding-bottom: 10px; color: #333; }
        .scanner-grid { display: flex; gap: 30px; margin-top: 20px; }
        .webcam-box { flex: 1; border: 2px dashed #666; background: #fafafa; height: 250px; display: flex; flex-direction: column; align-items: center; justify-content: center; color: #666; text-align: center; padding: 10px; }
        .controls-box { flex: 1; display: flex; flex-direction: column; justify-content: flex-start; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #555; }
        input[type="text"] { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { background-color: #222; color: white; padding: 10px 15px; border: none; width: 100%; border-radius: 4px; cursor: pointer; font-size: 15px; }
        button:hover { background-color: #444; }
        .status-log { margin-top: 20px; background: #e9ecef; padding: 15px; border-radius: 4px; border-left: 5px solid #28a745; }
        .status-log h4 { margin: 0 0 5px 0; font-size: 14px; color: #495057; }
        .status-log p { margin: 0; font-weight: bold; color: #155724; }
    </style>
</head>
<body>

<div class="header">
    <div><strong>[ADMIN PORTAL]</strong></div>
    <div>Scanner Mode</div>
</div>

<div class="container">
    <h3>5. QR ATTENDANCE SCANNER (FR09, FR10)</h3>
    
    <div class="scanner-grid">
        <!-- Live Camera Viewport Wireframe Representation -->
        <div class="webcam-box">
            <p style="font-family: monospace; font-weight: bold;">[ CAMERA / WEBCAM FEED ]</p>
            <p style="font-size: 13px;">Align Participant QR Code Here</p>
        </div>

        <!-- Manual Input / Processing Box -->
        <div class="controls-box">
            <form action="process_scan.php" method="POST">
                <div class="form-group">
                    <label for="qr_string">Manual QR String Input</label>
                    <input type="text" id="qr_string" name="qr_string" placeholder="e.g., REG-2026-101" required>
                </div>
                <button type="submit">Verify & Record Attendance</button>
            </form>

            <div class="status-log">
                <h4>Latest Status:</h4>
                <p>✓ John Doe verified at 09:45 AM</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>