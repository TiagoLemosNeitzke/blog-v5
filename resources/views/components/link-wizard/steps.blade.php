@props(['steps'])

<div class="flex items-center rounded bg-gray-50 ring-1 ring-black/[.075]">
    @foreach ($steps as $step)
        <div @class([
            'flex-1 p-4 text-xs font-bold tracking-widest text-center uppercase cursor-default',
            'bg-gradient-to-b from-blue-50/50 to-blue-50 text-blue-600 rounded shadow shadow-blue-300/50 ring-1 ring-blue-200' => $step->isCurrent(),
        ])>
            {{ $loop->iteration }}. {{ $step->label }}
        </div>
    @endforeach
</div>