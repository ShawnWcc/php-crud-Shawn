<!DOCTYPE html>
<html>
<head>
    <title>Student Branch Directory System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #4CAF50;
            margin-bottom: 30px;
        }
        .nav {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .nav a {
            text-decoration: none;
            background: #4CAF50;
            color: #fff;
            padding: 12px 20px;
            border-radius: 8px;
            transition: 0.3s;
        }
        .nav a:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Student Branch Directory System</h1>
    <div class="nav">
        <a href="create.php">Add Student</a>
        <a href="read.php">View Students</a>
        <a href="read.php">Update Student</a>
        <a href="read.php">Delete Student</a>
    </div>
</div>
</body>
</html>
