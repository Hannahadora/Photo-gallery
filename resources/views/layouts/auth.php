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
        <?php require __DIR__ . '/../components/side-nav.php'; ?>

        <main class="dashboard-main">
            <?= $page_content ?? '' ?>
        </main>
    </div>
</body>

</html>
