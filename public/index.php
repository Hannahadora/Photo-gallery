<?php

require_once __DIR__ . '/../config/init.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/');

switch ($uri) {

    case '':
        require __DIR__ . '/../resources/views/home/index.php';
        break;

    case 'login':
        $content_file = __DIR__ . '/../resources/views/auth/login.php';

        require __DIR__ . '/../resources/views/layouts/app.php';
        break;

    case 'dashboard':

        if (!$session->is_signed_in()) {
            header('Location: /login');
            exit();
        }

        $content_file = __DIR__ . '/../resources/views/dashboard/index.php';

        require __DIR__ . '/../resources/views/layouts/auth.php';
        break;

    default:
        http_response_code(404);
        echo 'Page not found';
        break;
}

?>
