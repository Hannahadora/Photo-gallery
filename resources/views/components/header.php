<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Gallery</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/header.css">
    <link rel="stylesheet" href="/assets/css/topNav.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="/assets/css/footer.css">
</head>

<body>
    <div>
        <header class="header-wrapper app-container">
            <h1>Photo Gallery</h1>
            <?php include __DIR__ . '/top-nav.php'; ?>

            <div class="header-btns">
                <input type="search" placeholder="Search photos...">
                <button class="btn-sec">Login</button>
                <button class="btn-pry">Register</button>
            </div>
        </header>