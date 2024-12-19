<x-filament-widgets::widget>
    <x-filament::section collapsible>
        <x-slot name="heading">
            {{ __('keys.messages') }}
        </x-slot>
        <div id="chat"
            class="relative max-h-96 pt-5 pl-4 pr-4 overflow-y-auto rounded bg-neutral-100 text-neutral-800 dark:bg-neutral-800">
            {{-- Messages --}}
            <div class="flex flex-col-reverse">
                @if (count($messages) > 0)
                    @foreach ($messages as $m)
                        <x-filament.chat.message :message="$m"></x-chat.message>
                    @endforeach
                @else
                    <div class="py-4 gap-3 flex flex-col items-center justify-center">
                        <x-heroicon-o-x-circle class="text-red-500 w-16" />
                        <p class="dark:text-neutral-100">{{ __('keys.no messages yet') }}</p>
                    </div>
                @endif

            </div>
            {{-- Send Button --}}
            <div class="sticky bottom-0 left-0 w-full py-1.5 backdrop-blur-sm">
                <x-filament.chat.message-send :cardid="$record['id']"></x-filament.chat.message-send>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
