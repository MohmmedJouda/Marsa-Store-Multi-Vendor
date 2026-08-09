<div {{ $attributes->merge(['class' => 'w-full space-y-4']) }}>
    <!-- Title & Description Above Section -->
    <div class="px-1 space-y-1">
        <h3 class="text-xl font-black text-white flex items-center gap-2">
            {{ $title }}
        </h3>
        <p class="text-xs text-slate-400 leading-relaxed">
            {{ $description }}
        </p>
    </div>

    <!-- Full-Width Inner Dark Section Card -->
    <div class="w-full p-6 sm:p-8 bg-slate-950/80 border border-slate-800 rounded-3xl shadow-2xl">
        {{ $content }}
    </div>
</div>
