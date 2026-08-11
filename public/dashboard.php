<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Gallery Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>

<body>
    <div class="dashboard-page">
        <?php require_once __DIR__ . '/../config/init.php'; ?>
        <?php include __DIR__ . '/../includes/side-nav.php'; ?>

        <main class="dashboard-main">
            <div class="dashboard-topbar">
                <div class="dashboard-title">
                    <p class="page-label">Dashboard</p>
                    <h1>Welcome back, curator.</h1>

                    <?php
                        $users = User::find_all_users();
                        foreach ($users as $user) {
                            echo "<p>User: " . $user->id . "</p>";
                        } 

                        $found_user = User::get_user_by_id(3);
                        echo "<p>Current User: " . $found_user->username . "</p>";

                        $user = User::instantiation($found_user);
                        echo "ins". $user->id . "";

                    ?>
                    
                    <p>Track gallery performance, view the latest uploads, and manage your creative space.</p>
                </div>
                <div class="dashboard-action-group">
                    <button class="btn btn-sec">Add Photo</button>
                    <button class="btn btn-pry">View Analytics</button>
                </div>
            </div>

            <section class="dashboard-stats">
                <div class="dashboard-card">
                    <h3>Total Photos</h3>
                    <p class="stat-number">128</p>
                    <p class="stat-meta">+12% from last month</p>
                </div>
                <div class="dashboard-card">
                    <h3>Total Views</h3>
                    <p class="stat-number">3,842</p>
                    <p class="stat-meta">+8% from last month</p>
                </div>
                <div class="dashboard-card">
                    <h3>Likes Received</h3>
                    <p class="stat-number">256</p>
                    <p class="stat-meta">+15% from last month</p>
                </div>
                <div class="dashboard-card">
                    <h3>Storage Used</h3>
                    <p class="stat-number">1.2 GB</p>
                    <p class="stat-meta">24% used</p>
                </div>
            </section>

            <section class="dashboard-panels">
                <div class="panel-grid">
                    <div class="panel-card panel-card-large">
                        <div class="panel-heading">
                            <h2>Recent Photos</h2>
                            <span>Latest uploads</span>
                        </div>
                        <div class="recent-list">
                            <div class="recent-item">
                                <div><strong>Sunset Bliss</strong></div>
                                <span>2 days ago</span>
                            </div>
                            <div class="recent-item">
                                <div><strong>Mountain Lake</strong></div>
                                <span>3 days ago</span>
                            </div>
                            <div class="recent-item">
                                <div><strong>Forest Path</strong></div>
                                <span>4 days ago</span>
                            </div>
                            <div class="recent-item">
                                <div><strong>City Lights</strong></div>
                                <span>5 days ago</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-card panel-card-small">
                        <div class="panel-heading">
                            <h2>Recent Activity</h2>
                            <span>Updates</span>
                        </div>
                        <div class="highlight-list">
                            <div class="highlight-item"><span class="highlight-dot"></span><p>You uploaded a new photo</p></div>
                            <div class="highlight-item"><span class="highlight-dot"></span><p>You liked Mountain Lake</p></div>
                            <div class="highlight-item"><span class="highlight-dot"></span><p>Profile updated</p></div>
                        </div>
                    </div>
                </div>

                <div class="panel-grid">
                    <div class="panel-card panel-card-medium">
                        <div class="panel-heading">
                            <h2>Photos Over Time</h2>
                            <span>Last 7 days</span>
                        </div>
                        <div class="chart-mockup">
                            <div class="chart-line"></div>
                            <div class="chart-point point-1"></div>
                            <div class="chart-point point-2"></div>
                            <div class="chart-point point-3"></div>
                            <div class="chart-point point-4"></div>
                        </div>
                    </div>
                    <div class="panel-card panel-card-small">
                        <div class="panel-heading">
                            <h2>Photos by Category</h2>
                            <span>Current breakdown</span>
                        </div>
                        <div class="quick-links">
                            <a href="#">Landscape - 40%</a>
                            <a href="#">Nature - 28%</a>
                            <a href="#">City - 17%</a>
                            <a href="#">People - 15%</a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>

</html>