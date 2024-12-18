@vite('resources/css/filament/admin/theme.css')
<div>
    <form action="/admin/customer-service" method="post">
        @csrf
        <div class="flex gap-2 w-full items-center justify-between">
            <input type="hidden" name="card_id" value="{{ $cardid }}">
            <textarea dir="auto" id="resizeable-ta" name="message" style="field-sizing:content;"
                class="min-h-[1lh] max-h-[3lh] resize-none flex-1 rounded p-2" placeholder="{{ __('keys.your-message') }}"
                maxlength="2500" minlength="1" rows="1">{{ old('message') }}</textarea>
            <button class="rounded bg-blue-600 text-white max-h-9 p-2" type="submit">{{ __('keys.send') }}</button>
        </div>
    </form>
</div>
