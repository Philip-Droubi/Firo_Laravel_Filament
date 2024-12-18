<x-filament-widgets::widget>
    <x-filament::section collapsible>
        <x-slot name="heading">
            {{ __('keys.messages') }}
        </x-slot>
        <div id="chat"
            class="relative max-h-96 pt-5 pl-4 pr-4 overflow-y-auto rounded bg-neutral-100 text-neutral-800">
            {{-- Messages --}}
            <div class="flex flex-col-reverse">
                @foreach ($messages as $m)
                    <x-filament.chat.message :message="$m"></x-chat.message>
                @endforeach
            </div>
            {{-- Send Button --}}
            <div class="sticky bottom-0 left-0 w-full py-2 backdrop-blur-sm">
                <x-filament.chat.message-send :cardid="$record['id']"></x-filament.chat.message-send>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
