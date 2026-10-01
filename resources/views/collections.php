<?php
$page_title = 'Collections';
$collections = [
    ['name' => 'Summer Escape', 'count' => '18 photos', 'accent' => 'from-amber-300 via-orange-400 to-pink-500'],
    ['name' => 'City Frames', 'count' => '24 photos', 'accent' => 'from-sky-400 via-indigo-500 to-violet-600'],
    ['name' => 'Nature Notes', 'count' => '31 photos', 'accent' => 'from-emerald-400 via-green-500 to-lime-500'],
    ['name' => 'Portrait Mood', 'count' => '12 photos', 'accent' => 'from-fuchsia-400 via-pink-500 to-rose-500'],
];
?>

<div class="space-y-8 p-2 sm:p-4">
    <header class="flex flex-col gap-4 rounded-[28px] border border-slate-200 bg-white p-6 shadow-[0_18px_60px_rgba(15,23,42,0.06)] sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-indigo-600">Collections</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Curated albums</h1>
        </div>
        <button class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-700">+ New collection</button>
    </header>

    <section class="grid gap-5 md:grid-cols-2">
        <?php foreach ($collections as $collection): ?>
            <article class="overflow-hidden rounded-[28px] border border-slate-200 bg-white shadow-[0_18px_55px_rgba(15,23,42,0.06)] transition hover:-translate-y-1 hover:shadow-[0_22px_60px_rgba(79,70,229,0.10)]">
                <div class="h-44 bg-gradient-to-br <?= $collection['accent'] ?> p-6">
                    <div class="flex h-full items-end justify-between">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-white/80">Album</p>
                            <h2 class="mt-2 text-3xl font-bold text-white"><?= htmlspecialchars($collection['name']) ?></h2>
                        </div>
                        <button class="rounded-full bg-white/15 p-2 text-white backdrop-blur-sm">♡</button>
                    </div>
                </div>
                <div class="flex items-center justify-between p-5">
                    <div>
                        <p class="text-sm text-slate-500">Contains</p>
                        <p class="mt-1 text-lg font-semibold text-slate-900"><?= htmlspecialchars($collection['count']) ?></p>
                    </div>
                    <button class="rounded-full border border-slate-200 bg-slate-50 px-3 py-2 text-sm font-medium text-slate-700 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-700">Open</button>
                </div>
            </article>
        <?php endforeach; ?>
    </section>
</div>
