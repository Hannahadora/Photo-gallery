<?php
$page_title = 'Upload Photo';
?>

<div class="min-h-screen bg-slate-100 px-4 py-8 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-5xl">
        <div class="overflow-hidden rounded-[32px] border border-slate-200 bg-white shadow-[0_25px_80px_rgba(15,23,42,0.08)]">
            <div class="grid gap-0 lg:grid-cols-[1.1fr_0.9fr]">
                <div class="bg-gradient-to-br from-indigo-600 via-violet-600 to-purple-600 p-8 sm:p-10 lg:p-12">
                    <div class="flex h-full flex-col justify-between gap-8 text-white">
                        <div>
                            <p class="inline-flex rounded-full bg-white/15 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-indigo-100 backdrop-blur-sm">
                                Upload
                            </p>
                            <h1 class="mt-5 text-3xl font-bold tracking-tight sm:text-4xl">Share a new photo</h1>
                            <p class="mt-4 max-w-md text-sm leading-6 text-indigo-100 sm:text-base">
                                Add your favorite moments, enrich them with context, and keep your gallery beautifully organized.
                            </p>
                        </div>

                        <div class="rounded-3xl border border-white/20 bg-white/10 p-5 backdrop-blur-sm">
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-indigo-100">Checklist</p>
                            <ul class="mt-4 space-y-3 text-sm text-indigo-50">
                                <li class="flex items-center gap-3"><span class="h-2.5 w-2.5 rounded-full bg-emerald-300"></span> JPG, PNG, or WEBP image</li>
                                <li class="flex items-center gap-3"><span class="h-2.5 w-2.5 rounded-full bg-emerald-300"></span> Compelling title and story</li>
                                <li class="flex items-center gap-3"><span class="h-2.5 w-2.5 rounded-full bg-emerald-300"></span> Optional tags for easy search</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="p-6 sm:p-8 lg:p-10">
                    <form id="uploadForm" action="/upload" method="POST" enctype="multipart/form-data" class="space-y-6">
                        <div>
                            <label for="title" class="mb-2 block text-sm font-medium text-slate-700">Title</label>
                            <input id="title" type="text" name="title" placeholder="Photo title" required class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 shadow-sm outline-none transition focus:border-indigo-400 focus:bg-white focus:ring-4 focus:ring-indigo-100">
                        </div>

                        <div>
                            <label for="description" class="mb-2 block text-sm font-medium text-slate-700">Description</label>
                            <textarea id="description" name="description" rows="4" placeholder="Describe your photo (optional)" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 shadow-sm outline-none transition focus:border-indigo-400 focus:bg-white focus:ring-4 focus:ring-indigo-100"></textarea>
                        </div>

                        <div>
                            <label for="tags" class="mb-2 block text-sm font-medium text-slate-700">Tags</label>
                            <input id="tags" type="text" name="tags" placeholder="landscape,sunset,nature" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 shadow-sm outline-none transition focus:border-indigo-400 focus:bg-white focus:ring-4 focus:ring-indigo-100">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700">Photo file</label>
                            <label for="photoInput" class="group flex cursor-pointer flex-col items-center justify-center rounded-3xl border-2 border-dashed border-slate-200 bg-slate-50 px-5 py-8 text-center transition hover:border-indigo-300 hover:bg-indigo-50/50">
                                <span class="inline-flex rounded-full bg-indigo-100 p-3 text-indigo-600 shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 16V4m0 0 4 4m-4-4-4 4"/>
                                        <path d="M20 16.5v1.25A2.25 2.25 0 0 1 17.75 20h-11.5A2.25 2.25 0 0 1 4 17.75V16.5"/>
                                    </svg>
                                </span>
                                <span class="mt-4 text-sm font-semibold text-slate-700">Choose a photo</span>
                                <span class="mt-1 text-xs text-slate-500">PNG, JPG, GIF, WEBP up to 10MB</span>
                                <input id="photoInput" type="file" name="photo" accept="image/*" required class="sr-only">
                            </label>
                        </div>

                        <div id="preview" class="hidden min-h-[180px] overflow-hidden rounded-3xl border border-slate-200 bg-slate-50 p-3 shadow-inner"></div>

                        <div class="flex flex-col gap-3 pt-2 sm:flex-row sm:justify-end">
                            <a href="/dashboard" class="inline-flex items-center justify-center rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:border-slate-300 hover:bg-slate-50">Cancel</a>
                            <button type="submit" class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-indigo-600 to-violet-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition hover:translate-y-[-1px] hover:shadow-xl hover:shadow-indigo-500/25">Upload Photo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('photoInput').addEventListener('change', function (e) {
        const preview = document.getElementById('preview');
        preview.innerHTML = '';
        preview.classList.add('hidden');

        const file = e.target.files && e.target.files[0];
        if (!file) return;

        if (!file.type.startsWith('image/')) {
            preview.classList.remove('hidden');
            preview.innerHTML = '<div class="flex h-full min-h-[180px] items-center justify-center rounded-2xl border border-rose-200 bg-rose-50 px-4 text-sm font-medium text-rose-600">Selected file is not an image.</div>';
            return;
        }

        const img = document.createElement('img');
        img.className = 'h-[180px] w-full rounded-2xl object-cover shadow-sm';
        img.alt = file.name;
        preview.appendChild(img);
        preview.classList.remove('hidden');

        const reader = new FileReader();
        reader.onload = function (evt) {
            img.src = evt.target.result;
        };
        reader.readAsDataURL(file);
    });
</script>
