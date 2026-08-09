<div class="w-full flex justify-between items-center mb-3">
    <div class="px-1">
        <h3 class="text-xl font-black text-white">{{ $title }}</h3>

        <p class="mt-1 text-xs text-slate-400">
            {{ $description }}
        </p>
    </div>

    <div class="px-1">
        {{ $aside ?? '' }}
    </div>
</div>
