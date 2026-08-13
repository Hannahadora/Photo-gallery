<?php include __DIR__ . '/../resources/views/components/header.php'; ?>

<?php

require_once __DIR__ . '/../config/init.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/');

switch ($uri) {

    case '':
        require __DIR__ . '/../public/index.php';
        break;

    case 'login':
        $content_file = __DIR__ . '/../resources/views/login/index.php';

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

<!-- Hero Section -->
<section class="home-hero">
    <div class="hero-content">
        <h2>Capture. Shine. Inspire</h2>
        <p>A place to store your memories and discover places around the world</p>
        <button class="btn btn-pry btn-lg">Upload Your Photo</button>
    </div>
    <div class="hero-overlay"></div>
</section>

<!-- Featured Photos Section -->
<section class="featured-section">
    <div class="section-container">
        <div class="section-header">
            <h2>Featured Photos</h2>
            <p>Explore stunning photographs from our community</p>
        </div>
        <div class="gallery-grid">
            <div class="gallery-card">
                <img src="assets/images/featured-1.jpg" alt="Mountain Landscape">
                <div class="card-overlay">
                    <div class="card-content">
                        <h3>Mountain Peaks</h3>
                        <p>Breathtaking alpine scenery</p>
                    </div>
                </div>
            </div>
            <div class="gallery-card">
                <img src="assets/images/featured-2.jpg" alt="Ocean Sunset">
                <div class="card-overlay">
                    <div class="card-content">
                        <h3>Ocean Sunsets</h3>
                        <p>Golden hour by the sea</p>
                    </div>
                </div>
            </div>
            <div class="gallery-card">
                <img src="assets/images/featured-3.jpg" alt="Forest Trail">
                <div class="card-overlay">
                    <div class="card-content">
                        <h3>Forest Trails</h3>
                        <p>Nature's peaceful pathways</p>
                    </div>
                </div>
            </div>
            <div class="gallery-card">
                <img src="assets/images/featured-4.jpg" alt="Urban Architecture">
                <div class="card-overlay">
                    <div class="card-content">
                        <h3>Urban Life</h3>
                        <p>Modern city moments</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="categories-section">
    <div class="section-container">
        <div class="section-header">
            <h2>Explore Categories</h2>
            <p>Browse photos by type and mood</p>
        </div>
        <div class="categories-grid">
            <div class="category-card">
                <div class="category-image">
                    <img src="assets/images/category-nature.jpg" alt="Nature">
                </div>
                <div class="category-info">
                    <h3>Nature</h3>
                    <p>12,540 photos</p>
                    <a href="gallery.php?cat=nature" class="category-link">View →</a>
                </div>
            </div>
            <div class="category-card">
                <div class="category-image">
                    <img src="assets/images/category-travel.jpg" alt="Travel">
                </div>
                <div class="category-info">
                    <h3>Travel</h3>
                    <p>8,920 photos</p>
                    <a href="gallery.php?cat=travel" class="category-link">View →</a>
                </div>
            </div>
            <div class="category-card">
                <div class="category-image">
                    <img src="assets/images/category-people.jpg" alt="People">
                </div>
                <div class="category-info">
                    <h3>People</h3>
                    <p>15,330 photos</p>
                    <a href="gallery.php?cat=people" class="category-link">View →</a>
                </div>
            </div>
            <div class="category-card">
                <div class="category-image">
                    <img src="assets/images/category-urban.jpg" alt="Urban">
                </div>
                <div class="category-info">
                    <h3>Urban</h3>
                    <p>9,750 photos</p>
                    <a href="gallery.php?cat=urban" class="category-link">View →</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="stats-section">
    <div class="section-container">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">1.2M+</div>
                <div class="stat-label">Photos Uploaded</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">150K+</div>
                <div class="stat-label">Active Members</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">50+</div>
                <div class="stat-label">Countries</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">98%</div>
                <div class="stat-label">User Satisfaction</div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="cta-section">
    <div class="cta-content">
        <h2>Ready to Share Your Story?</h2>
        <p>Join thousands of photographers sharing their passion with the world</p>
        <div class="cta-buttons">
            <button class="btn btn-pry btn-lg">Get Started Today</button>
            <button class="btn btn-sec btn-lg">Learn More</button>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../resources/views/components/footer.php'; ?>