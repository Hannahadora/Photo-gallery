<?php

require_once __DIR__ . '/../../../config/init.php';

if ($session->is_signed_in()) {
    header("Location: /dashboard");
    exit();
}

// Optionally show any auth error passed via session
$auth_error = $_SESSION['auth_error'] ?? null;
unset($_SESSION['auth_error']);

if (isset($_POST['submit'])) {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // TODO: Implement authentication logic here, e.g., check against database

    $user_found = User::verify_user($username, $password);

    if ($user_found) {
        $session->login($user_found);
        header("Location: /dashboard");
        exit();
    } else {
        $auth_error = "Invalid username or password.";
    }
} else {
    $username = '';
    $password = '';
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
            max-width: 420px;
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

        .auth-error {
            background: #fff4f4;
            color: #8b1c1c;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ffd6d6;
            margin-bottom: 14px
        }

        .auth-meta {
            margin-top: 12px;
            text-align: center;
            color: #6b7280;
            font-size: 14px
        }

        @media (max-width:480px) {
            .auth-wrapper {
                padding: 28px 0
            }

            .auth-card {
                padding: 22px
            }
        }
    </style>

    <div class="auth-wrapper">
        <div class="auth-card">
            <h2>Sign in to your account</h2>
            <p class="lead">Welcome back — enter your details to continue.</p>

            <?php if (!empty($auth_error)): ?>
                <div class="auth-error"><?php echo htmlspecialchars($auth_error); ?></div>
            <?php endif; ?>

            <form method="post" action="/auth/authenticate.php">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" name="username" type="text" class="form-input" required value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" class="form-input" required>
                </div>

                <div class="form-group">
                    <label style="display:flex;gap:8px;align-items:center"><input type="checkbox" name="remember"> Remember me</label>
                </div>

                <div class="form-actions">
                    <a href="register.php" class="btn btn-sec" style="text-decoration:none;display:inline-flex;align-items:center;justify-content:center;padding:10px 18px">Create account</a>
                    <button type="submit" class="btn btn-pry">Sign in</button>
                </div>

                <div class="auth-meta">
                    <a href="forgot-password.php">Forgot your password?</a>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../components/footer.php'; ?>