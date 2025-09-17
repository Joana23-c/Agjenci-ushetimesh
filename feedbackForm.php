<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO feedback_db (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        $success_message = "Feedback submitted successfully!";
    } else {
        $error_message = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            background-image: url("tree-6147402_1920.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;

        }

        .container {
            width: 50%;
            margin: 50px auto;
            /*background-color: white;*/
            padding: 20px;
            box-shadow: 0 4px 8px rgb(255, 255, 255);

            background-color: transparent;
            backdrop-filter: blur(30px);
        }

        h1 {
            text-align: center;
            color: white;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            font-size: 16px;
        }

        input, textarea {
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        button {
            padding: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .message {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error-message {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        input{
            background-color: transparent;
            backdrop-filter: blur(30px);
            border-radius: 10px;
            border-color: white;
        }
        textarea {
            background-color: transparent;
            backdrop-filter: blur(30px);
            border-radius: 10px;
            border-color: white;
        }
        label {
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Feedback Form</h1>

    <?php if (isset($success_message)) { ?>
        <div class="message">
            <?= $success_message; ?>
        </div>
    <?php } elseif (isset($error_message)) { ?>
        <div class="error-message">
            <?= $error_message; ?>
        </div>
    <?php } ?>

    <form id="feedback-form" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>

        <button type="submit">Submit Feedback</button>
    </form>
</div>

<script>
    document.getElementById('feedback-form').addEventListener('submit', function(e) {
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const message = document.getElementById('message').value;

        if (!name || !email || !message) {
            alert("Please fill in all the fields.");
            e.preventDefault();
        }
    });
</script>

</body>
</html>
