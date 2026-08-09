@props(['submit'])

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
    <div class="w-full">
        <form wire:submit="{{ $submit }}">
            <div class="p-6 sm:p-8 bg-slate-950/80 border border-slate-800 shadow-2xl {{ isset($actions) ? 'rounded-t-3xl border-b-0' : 'rounded-3xl' }}">
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end px-6 py-4 bg-slate-900/90 border border-slate-800 rounded-b-3xl text-left shadow-2xl">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>