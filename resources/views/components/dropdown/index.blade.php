<div
    {{ $attributes->merge([
        'x-data' => '{ open: false }',
    ]) }}
>
    <button {{ $btn->attributes->merge(['@click' => 'open = !open']) }}>
        {{ $btn }}
    </button>

    <div
        {{
            $items
                ->attributes
                ->class('z-10 py-2 text-base bg-white/75 backdrop-blur-md rounded-lg shadow-lg ring-1 ring-black/10 min-w-[240px] max-w-[360px]')
                ->merge([
                    'x-anchor.bottom' => '$el.previousElementSibling',
                    'x-cloak' => true,
                    'x-show' => 'open',
                    'x-trap' => 'open',
                    '@keydown.esc' => 'open = false',
                    '@keydown.arrow-down.stop.prevent' => '$focus.next()',
                    '@keydown.arrow-up.stop.prevent' => '$focus.prev()',
                    '@click.away' => 'open = false',
                ])
        }}
        {{-- I have no idea why this attribute causes an error if it's in merge() --}}
        x-transition
    >
        {{ $items }}
    </div>
</div>
