<?php
// index.php - welcome page for Student Branch Directory System
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Student Branch Directory System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            height: 100vh;
            background: url('background.jpg') no-repeat center center fixed;
            background-size: cover;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .background-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.6);
            z-index: 0;
        }

        h2 {
            position: relative;
            z-index: 1;
            margin-bottom: 30px;
            text-align: center;
            font-size: 2em;
            color: #f0f0f0;
            text-shadow: 2px 2px 4px #000;
        }

        .form-container {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            gap: 15px;
            align-items: center;
        }

        .btn {
            text-decoration: none;
            padding: 12px 25px;
            background-color: #4CAF50;
            color: white;
            border-radius: 6px;
            transition: all 0.3s ease;
            font-weight: bold;
            width: 220px;
            text-align: center;
        }

        .btn:hover {
            background-color: #45a049;
            transform: translateY(-3px);
            box-shadow: 0 5px 10px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>
    <div class="background-overlay"></div>
    <h2>Welcome to Student Branch Directory System!</h2>
    <div class="form-container">
        <a href="create.php" class="btn">Add Student</a>
        <a href="read.php" class="btn">View Student</a>
        <a href="read.php" class="btn">Update Student</a>
        <a href="read.php" class="btn">Delete Student</a>
    </div>
</body>
</html>
