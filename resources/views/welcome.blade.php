<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend Status</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
        }
        .container {
            text-align: center;
            padding: 50px 40px;
            border-radius: 16px;
            background-color: #ffffff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
            transition: transform 0.3s ease;
        }
        .container:hover {
            transform: translateY(-5px);
        }
        h1 {
            color: #1f2937;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        p {
            color: #4b5563;
            font-size: 1.2rem;
        }
        .status {
            margin-top: 20px;
            font-weight: bold;
            color: #10b981; /* green */
            font-size: 1.1rem;
        }
        .info {
            margin-top: 15px;
            color: #2563eb; /* blue */
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Backend Status</h1>
        <p>The backend is running successfully!</p>
        <div class="status">✅ Status: Online</div>
        <div class="info">
            You can now try to <strong>login</strong> or <strong>sign up</strong> via Postman or any API client.
        </div>
    </div>
</body>
</html>
