<x-filament-widgets::widget>
    <x-filament::section collapsible>
        <x-slot name="heading">
            {{ __('keys.messages') }}
        </x-slot>

        <div id="chat"
            class="flex flex-col-reverse max-h-96 pt-5 pl-4 pr-4 overflow-y-auto rounded bg-neutral-100 text-neutral-800">
            @foreach ($messages as $m)
                <x-filament.chat.message :message="$m"></x-chat.message>
            @endforeach
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
