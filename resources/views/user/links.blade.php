<x-app>
    <x-section title="Your links" class="lg:max-w-screen-md">
        <div class="grid gap-8 md:gap-12">
            @foreach ($links as $link)
                <div class="flex gap-4 items-start md:gap-6">
                    <img
                        loading="lazy"
                        src="{{ $link->image_url }}"
                        alt="{{ $link->title  }}"
                        class="object-cover mt-1 rounded-md ring-1 shadow size-10 shadow-black/5 aspect-square ring-black/5"
                    />

                    <div class="pb-8 border-b border-gray-200 last:border-b-0 last:pb-0">
                        <p>
                            <a href="{{ $link->url }}" target="_blank" class="font-medium text-blue-600 underline">
                                {{ $link->url }}
                            </a>
                        </p>

                        <p class="mt-2 font-medium text-black">
                            {{ $link->title }}
                        </p>

                        <p class="text-gray-500">
                            {{ $link->description }}
                        </p>

                        <p class="mt-2">
                            <span>Status:</span>

                            @if ($link->isApproved())
                                <span class="font-medium text-green-600">Approved</span>
                            @else
                                <span>Pending</span>
                            @endif
                        </p>

                        <p>
                            <span>Submitted:</span> {{ $link->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <x-pagination :paginator="$links" />
    </x-section>
</x-app>
