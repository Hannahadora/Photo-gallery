<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/../config/init.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/');

switch ($uri) {

    case '':
        include('../resources/views/home/index.php');
        break;

    case 'login':
        $content_file = '../resources/views/auth/login.php';

        include '../resources/views/layouts/app.php';
        break;

    case 'dashboard':

        if (!$session->is_signed_in()) {
            header('Location: /login');
            exit();
        }

        $content_file = '../resources/views/dashboard/index.php';

        include '../resources/views/layouts/auth.php';
        break;

    default:
        http_response_code(404);
        echo 'Page not found';
        break;
}

?>
