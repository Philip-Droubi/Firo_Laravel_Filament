@vite('resources/css/filament/admin/theme.css')
<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div class="mx-auto border-2 border-gray-600 dark:border-gray-300 rounded w-fit" x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }">
        <img src="{{ asset($for == 'avatar' ? $getRecord()->img_url : $getRecord()->profile->bg_img_url) }}"
            alt="User Image" />
    </div>
</x-dynamic-component>
