<aside class="dashboard-sidebar">
    <div class="sidebar-brand">
        <div class="brand-mark">PG</div>
        <div>
            <div class="brand-title">Photo Gallery</div>
            <div class="brand-caption">Creator dashboard</div>
        </div>
    </div>

    <nav class="sidebar-nav">
        <a href="/dashboard" class="<?= ($active_nav ?? '') === 'dashboard' ? 'active' : '' ?>"><span>🏠</span> Dashboard</a>
        <a href="/photos" class="<?= ($active_nav ?? '') === 'photos' ? 'active' : '' ?>"><span>🖼️</span> My Photos</a>
        <a href="/upload" class="<?= ($active_nav ?? '') === 'upload' ? 'active' : '' ?>"><span>⬆️</span> Upload Photo</a>
        <a href="/gallery" class="<?= ($active_nav ?? '') === 'gallery' ? 'active' : '' ?>"><span>📂</span> Gallery</a>
        <a href="/collections" class="<?= ($active_nav ?? '') === 'collections' ? 'active' : '' ?>"><span>📷</span> Collections</a>
        <a href="/settings" class="<?= ($active_nav ?? '') === 'settings' ? 'active' : '' ?>"><span>⚙️</span> Settings</a>
        <a href="/logout" class="<?= ($active_nav ?? '') === 'logout' ? 'active' : '' ?>"><span>🚪</span>Logout</a>
    </nav>

    <div class="sidebar-cta">bg
        <h3>Need more storage?</h3>
        <p>Upgrade your plan to store and share more beautiful photos.</p>
        <button class="btn btn-pry">Upgrade Plan</button>
    </div>
</aside>
