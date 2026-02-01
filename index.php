
<?php
// Production-ready configuration
error_reporting(E_ALL);
ini_set('display_errors', 0); // Don't show errors to users
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/logs/error.log');

// Create logs directory if it doesn't exist
if (!is_dir(__DIR__ . '/logs')) {
    mkdir(__DIR__ . '/logs', 0755, true);
}

// Load environment variables from .env file
$env_file = __DIR__ . '/.env';
if (file_exists($env_file)) {
    $env = parse_ini_file($env_file);
} else {
    $env = [
        'DB_HOST' => 'localhost',
        'DB_USER' => 'root',
        'DB_PASS' => '',
        'DB_NAME' => 'trip'
    ];
}

$insert = false;
$error_msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    
    // Validate and sanitize inputs
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
    $gender = trim(filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $email = trim(filter_input(INPUT_POST, 'gmail', FILTER_SANITIZE_EMAIL));
    $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $desc = trim(filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    // Validate required fields
    if (empty($name) || !$age || empty($gender) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($phone)) {
        $error_msg = "Please fill all required fields with valid data.";
    } else {
        // Create database connection with error handling
        try {
            $con = new mysqli($env['DB_HOST'], $env['DB_USER'], $env['DB_PASS'], $env['DB_NAME']);
            
            if ($con->connect_error) {
                throw new Exception("Database connection failed: " . $con->connect_error);
            }
            
            // Use prepared statement to prevent SQL injection
            $sql = "INSERT INTO `trip` (`name`, `age`, `gender`, `mail`, `phone`, `desc`, `dt`) VALUES (?, ?, ?, ?, ?, ?, current_timestamp())";
            $stmt = $con->prepare($sql);
            
            if (!$stmt) {
                throw new Exception("Prepare failed: " . $con->error);
            }
            
            // Bind parameters (s=string, i=integer)
            $stmt->bind_param("ssisss", $name, $age, $gender, $email, $phone, $desc);
            
            if ($stmt->execute()) {
                $insert = true;
                // Optional: Send confirmation email
                // mail($email, "Trip Registration Confirmed", "Thank you for registering!");
            } else {
                throw new Exception("Insert failed: " . $stmt->error);
            }
            
            $stmt->close();
            $con->close();
            
        } catch (Exception $e) {
            error_log("Database Error: " . $e->getMessage());
            $error_msg = "An error occurred. Please try again later.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="RIT Trip to US Travel Registration Form">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <title>Welcome to Travel Form - RIT Trip</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="Rit_image.webp" alt="RIT image">
    <div class="container">
        <h1>Welcome to RIT trip to US travel form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        
        <?php 
        if ($insert) {
            echo "<p class='submit-message'>✓ Thank you for your interest in the trip!</p>";
        } elseif (!empty($error_msg)) {
            echo "<p class='error-message'>✗ " . htmlspecialchars($error_msg) . "</p>";
        }
        ?>
        
        <form action="index.php" method="post" novalidate>
            <input type="text" name="name" id="name" placeholder="Enter your name" required>
            <input type="number" name="age" id="age" placeholder="Enter your age" required>
            <select name="gender" id="gender" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            <input type="email" name="gmail" id="gmail" placeholder="Enter your email" required>
            <input type="tel" name="phone" id="phone" placeholder="Enter your phone" required>
            <textarea name="desc" id="desc" placeholder="Additional information" rows="4"></textarea>
            <button type="submit">Submit</button>
        </form>
        <script src="index.js"></script>
    </div>
</body>
</html>
