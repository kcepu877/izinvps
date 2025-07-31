<?php
$error = isset($_GET['error']) ? $_GET['error'] : 'unknown';

switch ($error) {
    case 'expired':
        $message = 'Your license key is inactive or has expired. Please contact the administrator.';
        break;
    case 'not_found':
        $message = 'License key not found!';
        break;
    case 'file_not_found':
        $message = 'Ooops, license file not found!';
        break;
    case 'domain_invalid':
        $message = 'The domain is not registered for this license key!';
        break;
    default:
        $message = 'An unknown error occurred. Please contact support.';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>License Error</title>
    <link rel="stylesheet" href="styles.css"> <!-- Optional: Include your CSS -->
</head>
<body>
    <h1>License Error</h1>
    <p><?php echo $message; ?></p>
    <p>Need our help? <a href="https://wa.me/6289523090952">Contact me.</p>
</body>
</html>