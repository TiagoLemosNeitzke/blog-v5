<x-app
    title="The latest community-written articles about web development in {{ date('Y') }}"
    description="A collection of content created and shared by other web developers."
>
    @if ($links->currentPage() === 1)
        <div class="container text-center">
            <h1 class="font-medium tracking-tight text-black text-4xl/none md:text-5xl lg:text-7xl text-balance">
                <span class="text-blue-600">Keep learning</span> with the community
            </h1>

            <div class="mt-5 tracking-tight text-balance text-black/75 text-lg/tight sm:text-xl/tight md:text-2xl/tight md:mt-8">
                Find tons of resources written and shared by <span class="font-medium">{{ $distinctUsersCount }} web developers</span>.
            </div>

            <div class="flex justify-center items-center mt-4 md:mt-6">
                @foreach ($distinctUserAvatars as $avatar)
                    <div class="overflow-hidden -ml-2 bg-white rounded-full">
                        <img loading="lazy" src="{{ $avatar }}" class="size-8 md:size-10" />
                    </div>
                @endforeach
            </div>

            <div class="flex gap-2 justify-center items-center mt-8 text-center md:mt-12">
                <x-btn href="#links">
                    Browse
                </x-btn>

                <x-btn
                    primary
                    :wire:navigate="auth()->check()"
                    href="{{ route('links.create') }}"
                >
                    Submit a link
                </x-btn>
            </div>
        </div>
    @endif

    <x-section :title="$links->currentPage() > 1
        ? 'Page ' . $links->currentPage()
        : 'Latest Links'" id="links" @class([
        'mt-16 md:mt-24' => $links->currentPage() === 1,
    ])>
        @if ($links->isNotEmpty())
            <x-links-grid :$links />
        @endif

        <x-pagination
            :paginator="$links"
            class="mt-16"
        />
    </x-section>
</x-app>
