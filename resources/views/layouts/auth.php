<?php
// Initialize config and dependencies first
require_once __DIR__ . '../../../config/init.php';

// Verify user is authenticated
// if(!$session->is_signed_in()){header("Location: login.php"); exit();}

?>

<?php

// require_once __DIR__ . '/../config/init.php';

// if (!$session->is_signed_in()) {
//     header('Location: /login');
//     exit();
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Dashboard'; ?> - Photo Gallery</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/dashboard.css">
</head>

<body>
    <div class="dashboard-page">

        <main class="dashboard-main">
            <?php include $content_file; ?>
        </main>
    </div>
</body>

</html>