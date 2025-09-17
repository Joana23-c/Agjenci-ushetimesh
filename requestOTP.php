
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        fieldset {
            border: 2px solid #0d6efd;
            border-radius: 10px;
            padding: 20px;
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        legend {
            font-size: 1.5rem;
            color: #0d6efd;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
            position: relative;
        }
        .form-control {
            padding: 10px 15px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            box-shadow: none;
        }
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 5px rgba(13, 110, 253, 0.5);
        }
        .btnSend {
            background-color: #0d6efd;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            width: 100%;
        }
        .btnSend:hover {
            background-color: #0b5ed7;
        }
    </style>
</head>
<body>
<fieldset>
    <legend>Reset Password</legend>
    <form action="sendOTP.php" method="POST">
        <div class="form-group">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btnSend">Send</button>
    </form>
</fieldset>

<!-- Bootstrap JS (optional for interactive elements) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
