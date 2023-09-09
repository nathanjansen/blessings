<div {{ $attributes->class('w-full h-full flex flex-col bg-white rounded-lg max-w-4xl mx-auto') }}>
    <div {{ $head->attributes->class('bg-primary-500 text-white py-12 px-6') }}>
{{--        <div class="pb-6">Menu</div>--}}

        <div>
            {{ $head }}
        </div>
    </div>

    <div class="px-6 h-full bg-gradient-to-t from-[#F3F3F3] to-white">
        {{ $slot }}
    </div>

    {{ $foot }}
</div>
