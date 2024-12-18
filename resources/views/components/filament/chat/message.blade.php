@vite('resources/css/filament/admin/theme.css')
<div
    class=" flex relative
    {{ $message['is_admin'] ? (app()->getLocale() == 'ar' ? '' : 'flex-row-reverse ms-auto') : (app()->getLocale() == 'ar' ? 'flex-row-reverse ms-auto' : 'me-auto') }}
    ">
    {{-- Avatar --}}
    <div class="{{ $message['is_admin'] ? 'ml-2' : 'mr-2' }}">
        <a href="/admin/{{ $message['is_admin'] ? 'admin' : 'users' }}/{{ $message['user_id'] }}">
            <img class="border border-gray-500 rounded-full size-12" src="{{ asset($message['user_img']) }}"
                alt="{{ $message['user_name'] }} avatar">
        </a>
    </div>
    {{-- Message --}}
    <div
        class="{{ $message['is_admin'] ? 'bg-purple-200 rounded-tr-none' : 'bg-orange-200 rounded-tl-none ms-auto' }}
        relative py-2 px-3 mb-3 mt-2
        rounded-xl max-w-[250px] xsm:max-w-[320px] sm:max-w-[390px] mdp:max-w-[500px]
        w-fit">
        {{-- User Name --}}
        <div class="w-fit {{ $message['is_admin'] ? '' : 'text-left' }}">
            <a href="/admin/{{ $message['is_admin'] ? 'admin' : 'users' }}/{{ $message['user_id'] }}">
                <p class="text-purple-800 font-bold">
                    {{ $message['user_name'] }} {{ $message['is_admin'] ? ' (Admin)' : '' }}
                </p>
            </a>
        </div>
        {{-- Message Date --}}
        <div>
            <p class="{{ $message['is_admin'] ? '' : 'text-left' }}
                text-neutral-600 text-xs mb-3">
                {{ $message['created_at'] }}
            </p>
        </div>
        {{-- Message Body --}}
        <div>
            <pre class="pre-default" dir="auto">{{ $message['message'] }}</pre>
        </div>
    </div>
</div>
