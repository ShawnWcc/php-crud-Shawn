<?php 
session_start();
include 'config/db.php';

$message = $_SESSION['message'] ?? "";
$popupType = $_SESSION['popupType'] ?? "";
$showPopup = !empty($message);
unset($_SESSION['message'], $_SESSION['popupType']);

if (isset($_POST["submit"])) {
    $student_no = $_POST["student_no"];
    $fullname = $_POST["fullname"];
    $branch = $_POST["branch"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];

    if (empty($student_no) || empty($fullname) || empty($branch) || empty($email) || empty($contact)) {
        $_SESSION['message'] = "Please fill in all fields.";
        $_SESSION['popupType'] = "error";
        $showPopup = true;
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif (!preg_match('/^\d{11,12}$/', $contact)) {
        $_SESSION['message'] = "
        <p>Contact must be a number and must be 11 or 12 digits only!</p>
        <img src='https://upload-os-bbs.hoyolab.com/upload/2025/07/15/437103041/772326e7d8ce2d0a7b2d9c4eed8be889_7763530691244285157.gif'alt='GIF' width='220'>";
        $_SESSION['popupType'] = "error";
        $showPopup = true;
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        try {
            $sql = "INSERT INTO students (student_no, fullname, branch, email, contact)
                    VALUES (:student_no, :fullname, :branch, :email, :contact)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':student_no', $student_no);
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':branch', $branch);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':contact', $contact);
            $stmt->execute();

            $_SESSION['message'] = "<h3>Product added successfully!</h3>
            <img src='https://tiermaker.com/images/template_images/2022/782255/all-genshin-impact-emotes-stickers-40-782255/110praise.png'
                alt='IMG' width='250'>";
            $_SESSION['popupType'] = "success";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } catch (PDOException $e) {
            $_SESSION['message'] = "Error: " . $e->getMessage();
            $_SESSION['popupType'] = "error";
            $showPopup = true;
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
    }
}

$students = [];
try {
    $result = $conn->query("SELECT * FROM students");
    $students = $result->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $message = "Error loading records: " . $e->getMessage();
    $popupType = "error";
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Student Record Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h2 {
            margin-top: 30px;
            color: #2c3e50;
        }
        .form-container {
            background: #fff;
            padding: 25px 35px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            width: 320px;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px;
            margin-top: 15px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background-color: #2980b9;
        }
        .background-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom right, #e0f7fa, #f1f8e9);
            z-index: -1;
        }
    </style>
</head>
<body>
<div class="background-overlay"></div>
<h2>Student Record</h2>
<div class="form-container">
    <form method="POST">
        <label>Student_No:</label>
        <input type="text" name="student_no">

        <label>Fullname:</label>
        <input type="text" name="fullname">

        <label>Branch:</label>
        <select name="branch" class="drop-down">
            <option value="">Select a Branch</option>
            <option value="Quezon City">Quezon City</option>
            <option value="North Manila">North Manila</option>
            <option value="Antipolo">Antipolo</option>
            <option value="Binalonan">Binalonan</option>
            <option value="Guimba">Guimba</option>
        </select>

        <label>Email:</label>
        <input type="text" name="email">

        <label>Contact:</label>
        <input type="text" name="contact">

        <button type="submit" name="submit">Add Student</button>
    </form>
</div>

<script>
function closePopup() {
    document.getElementById("popupOverlay").style.display = "none";
}
<?php if ($showPopup): ?>
document.getElementById("popupOverlay").style.display = "flex";
<?php endif; ?>
</script>
</body>
</html>

