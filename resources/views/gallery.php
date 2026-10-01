<?php
$page_title = 'Gallery';
$gallery = [
    ['title' => 'Mountain Air', 'tag' => 'Nature', 'accent' => 'from-sky-400 via-cyan-500 to-blue-600'],
    ['title' => 'Vivid Streets', 'tag' => 'Urban', 'accent' => 'from-violet-500 via-purple-600 to-indigo-700'],
    ['title' => 'Golden Coast', 'tag' => 'Travel', 'accent' => 'from-amber-400 via-orange-500 to-rose-500'],
    ['title' => 'Still Bloom', 'tag' => 'Floral', 'accent' => 'from-pink-400 via-fuchsia-500 to-violet-600'],
    ['title' => 'Night Shift', 'tag' => 'City', 'accent' => 'from-slate-700 via-slate-800 to-indigo-900'],
    ['title' => 'Field Notes', 'tag' => 'Landscape', 'accent' => 'from-emerald-400 via-green-500 to-teal-600'],
];
?>

<div class="space-y-8 p-2 sm:p-4">
    <header class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-[0_18px_60px_rgba(15,23,42,0.06)]">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-indigo-600">Gallery</p>
                <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Discover fresh inspiration</h1>
            </div>

            <div class="flex flex-wrap gap-2">
                <?php foreach (['All', 'Nature', 'Travel', 'City', 'Portraits'] as $filter): ?>
                    <button class="rounded-full border border-slate-200 bg-slate-50 px-3 py-2 text-sm font-medium text-slate-600 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-700 <?= $filter === 'All' ? 'border-indigo-200 bg-indigo-50 text-indigo-700' : '' ?>">
                        <?= htmlspecialchars($filter) ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>
    </header>

    <section class="grid gap-5 sm:grid-cols-2 xl:grid-cols-3">
        <?php foreach ($gallery as $item): ?>
            <article class="group overflow-hidden rounded-[28px] border border-slate-200 bg-white shadow-[0_18px_55px_rgba(15,23,42,0.06)]">
                <div class="relative h-72 bg-gradient-to-br <?= $item['accent'] ?> p-5">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(255,255,255,0.34),transparent_36%)]"></div>
                    <div class="relative flex h-full flex-col justify-between">
                        <div class="flex items-center justify-between">
                            <span class="rounded-full bg-white/15 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-[0.18em] text-white backdrop-blur-sm">
                                <?= htmlspecialchars($item['tag']) ?>
                            </span>
                            <button class="rounded-full bg-white/15 p-2 text-white backdrop-blur-sm transition hover:bg-white/25">♡</button>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white"><?= htmlspecialchars($item['title']) ?></h2>
                            <p class="mt-2 text-sm text-white/80">Curated from the community</p>
                        </div>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </section>
</div>
