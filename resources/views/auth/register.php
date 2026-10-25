<?php

require_once __DIR__ . '/../../../config/init.php';

if ($session->is_signed_in()) {
    header("Location: /dashboard");
    exit();
}

$page_title = 'Create account';

$first_name = '';
$last_name  = '';
$username   = '';
$errors     = [];

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $first_name       = trim($_POST['first_name'] ?? '');
    $last_name        = trim($_POST['last_name'] ?? '');
    $username         = trim($_POST['username'] ?? '');
    $password         = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';

    if ($first_name === '' || $last_name === '') {
        $errors[] = "Please enter your first and last name.";
    }

    if (!preg_match('/^[A-Za-z0-9_.-]{3,30}$/', $username)) {
        $errors[] = "Username must be 3–30 characters: letters, numbers, dots, dashes or underscores.";
    } elseif (User::username_exists($username)) {
        $errors[] = "That username is already taken.";
    }

    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters.";
    } elseif ($password !== $password_confirm) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($errors)) {
        $new_user = User::create($username, $password, $first_name, $last_name);

        if ($new_user) {
            $session->login($new_user);
            header("Location: /dashboard");
            exit();
        }

        $errors[] = "Something went wrong creating your account. Please try again.";
    }
}
?>

<?php include __DIR__ . '/../components/header.php'; ?>

<main class="app-container">
    <style>
        .auth-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 220px);
            padding: 56px 0
        }

        .auth-card {
            background: #ffffff;
            border-radius: 14px;
            padding: 34px;
            max-width: 460px;
            width: 100%;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.06)
        }

        .auth-card h2 {
            margin: 0 0 10px;
            font-size: 1.6rem;
            color: #111827
        }

        .auth-card p.lead {
            margin: 0 0 20px;
            color: #6b7280
        }

        .form-group {
            margin-bottom: 16px
        }

        .form-row {
            display: flex;
            gap: 12px
        }

        .form-row .form-group {
            flex: 1
        }

        .form-input {
            width: 100%;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid #e6e9ef;
            font-size: 14px
        }

        .form-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: 18px
        }

        .auth-errors {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            border-radius: 10px;
            padding: 12px 16px;
            margin-bottom: 18px;
            font-size: 14px
        }

        .auth-errors ul {
            margin: 0;
            padding-left: 18px
        }

        @media (max-width:480px) {
            .auth-wrapper {
                padding: 28px 0
            }

            .auth-card {
                padding: 22px
            }

            .form-row {
                flex-direction: column;
                gap: 0
            }
        }
    </style>

    <div class="auth-wrapper">
        <div class="auth-card">
            <h2>Create your account</h2>
            <p class="lead">Join to upload, organise and share your photos.</p>

            <?php if (!empty($errors)): ?>
                <div class="auth-errors">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlentities($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="post" action="/register">
                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">First name</label>
                        <input id="first_name" name="first_name" type="text" class="form-input" required value="<?php echo htmlentities($first_name) ?>">
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last name</label>
                        <input id="last_name" name="last_name" type="text" class="form-input" required value="<?php echo htmlentities($last_name) ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" name="username" type="text" class="form-input" required autocomplete="username" value="<?php echo htmlentities($username) ?>">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" class="form-input" required minlength="8" autocomplete="new-password">
                </div>

                <div class="form-group">
                    <label for="password_confirm">Confirm password</label>
                    <input id="password_confirm" name="password_confirm" type="password" class="form-input" required minlength="8" autocomplete="new-password">
                </div>

                <div class="form-actions">
                    <a href="/login" class="btn btn-sec" style="text-decoration:none;display:inline-flex;align-items:center;justify-content:center;padding:10px 18px">I have an account</a>
                    <button type="submit" class="btn btn-pry">Submit</button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../components/footer.php'; ?>
