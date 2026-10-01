<?php
$page_title = 'My Photos';
$photos = [
    ['title' => 'Golden Hour', 'location' => 'Cape Town', 'meta' => '2 days ago', 'size' => '4.8 MB', 'color' => 'from-amber-400 via-orange-500 to-rose-500'],
    ['title' => 'Coastal Drift', 'location' => 'Malibu', 'meta' => '1 week ago', 'size' => '3.2 MB', 'color' => 'from-sky-400 via-cyan-500 to-indigo-500'],
    ['title' => 'Forest Echo', 'location' => 'Kyiv', 'meta' => '2 weeks ago', 'size' => '5.1 MB', 'color' => 'from-emerald-400 via-teal-500 to-cyan-500'],
    ['title' => 'Night Routes', 'location' => 'Tokyo', 'meta' => '3 weeks ago', 'size' => '6.4 MB', 'color' => 'from-slate-700 via-violet-700 to-indigo-600'],
    ['title' => 'Bloom Study', 'location' => 'Seoul', 'meta' => '1 month ago', 'size' => '2.9 MB', 'color' => 'from-pink-400 via-fuchsia-500 to-violet-500'],
    ['title' => 'Quiet Ridge', 'location' => 'Banff', 'meta' => '1 month ago', 'size' => '4.2 MB', 'color' => 'from-lime-400 via-green-500 to-emerald-500'],
];
?>

<div class="space-y-8 p-2 sm:p-4">
    <header class="flex flex-col gap-4 rounded-[28px] border border-slate-200 bg-white p-6 shadow-[0_18px_60px_rgba(15,23,42,0.06)] sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-indigo-600">My Photos</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Your image library</h1>
        </div>
        <a href="/upload" class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-indigo-600 to-violet-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition hover:-translate-y-0.5">+ Upload photo</a>
    </header>

    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
        <?php foreach ($photos as $photo): ?>
            <article class="group overflow-hidden rounded-[28px] border border-slate-200 bg-white shadow-[0_18px_55px_rgba(15,23,42,0.06)] transition hover:-translate-y-1 hover:shadow-[0_25px_70px_rgba(79,70,229,0.12)]">
                <div class="relative">
                    <div class="h-64 bg-gradient-to-br <?= $photo['color'] ?> p-5">
                        <div class="flex h-full items-end justify-between">
                            <span class="inline-flex rounded-full bg-white/20 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-[0.18em] text-white backdrop-blur-sm">
                                <?= htmlspecialchars($photo['location']) ?>
                            </span>
                            <button class="rounded-full border border-white/25 bg-white/10 p-2 text-white backdrop-blur-sm transition hover:bg-white/20" aria-label="Favorite photo">
                                ♡
                            </button>
                        </div>
                    </div>
                </div>
                <div class="space-y-4 p-5">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <h2 class="text-lg font-semibold text-slate-900"><?= htmlspecialchars($photo['title']) ?></h2>
                            <p class="mt-1 text-sm text-slate-500"><?= htmlspecialchars($photo['meta']) ?></p>
                        </div>
                        <span class="rounded-full bg-slate-100 px-2.5 py-1 text-[11px] font-semibold text-slate-600"><?= htmlspecialchars($photo['size']) ?></span>
                    </div>

                    <div class="flex items-center justify-between border-t border-slate-100 pt-4 text-sm text-slate-600">
                        <button class="font-medium text-indigo-600 transition hover:text-indigo-500">Edit</button>
                        <button class="font-medium text-slate-500 transition hover:text-slate-700">Delete</button>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</div>
