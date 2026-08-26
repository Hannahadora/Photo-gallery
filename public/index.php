<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/../config/init.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/');

/**
 * Render a view inside one of the shared layouts.
 *
 * The view is captured before the layout is included so it can set values such
 * as $page_title without outputting markup before the document shell.
 */
$render = static function (string $view, string $layout, array $data = []) use ($session): void {
    // Views historically rely on the session instance created by config/init.php.
    $data['session'] ??= $session;
    extract($data, EXTR_SKIP);

    ob_start();
    require $view;
    $page_content = ob_get_clean();

    require $layout;
};

switch ($uri) {

    case '':
        require __DIR__ . '/../resources/views/home/index.php';
        break;

    case 'login':
        $render(
            __DIR__ . '/../resources/views/auth/login.php',
            __DIR__ . '/../resources/views/layouts/app.php'
        );
        break;

    case 'logout':
        // Logout performs a redirect, so it must run before any layout markup.
        require __DIR__ . '/../resources/views/auth/logout.php';
        break;

    case 'dashboard':
        $render(
            __DIR__ . '/../resources/views/dashboard/index.php',
            __DIR__ . '/../resources/views/layouts/auth.php',
            ['active_nav' => 'dashboard']
        );
        break;

    default:
        http_response_code(404);
        echo 'Page not found';
        break;
}

?>
