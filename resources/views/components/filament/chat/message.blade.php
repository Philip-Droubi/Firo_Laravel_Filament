@vite('resources/css/filament/admin/theme.css')
<div
    class=" flex relative
    {{ $message['is_admin'] ? (app()->getLocale() == 'ar' ? '' : 'flex-row-reverse ms-auto') : (app()->getLocale() == 'ar' ? 'flex-row-reverse ms-auto' : 'me-auto') }}
    ">
    {{-- Avatar --}}
    <div class="{{ $message['is_admin'] ? 'ml-2' : 'mr-2' }}">
        <a href="/admin/{{ $message['is_admin'] ? 'admin' : 'users' }}/{{ $message['user_id'] }}">
            <img class="border dark:border-2 border-gray-500 dark:border-[#ff6868] rounded-full size-12"
                src="{{ asset($message['user_img']) }}" alt="{{ $message['user_name'] }} avatar">
        </a>
    </div>
    {{-- Message --}}
    <div
        class="{{ $message['is_admin'] ? 'bg-purple-200 dark:bg-[#583a54] rounded-tr-none' : 'bg-orange-200 dark:bg-gray-600 rounded-tl-none ms-auto' }}
        relative py-2 px-3 mb-3 mt-2
        rounded-xl max-w-[250px] xsm:max-w-[320px] sm:max-w-[390px] mdp:max-w-[500px]
        w-fit">
        {{-- User Name --}}
        <div
            class="flex items-center justify-between
        {{ app()->getLocale() == 'ar' ? 'flex-row-reverse' : '' }}">
            <div class="w-fit {{ $message['is_admin'] ? '' : (app()->getLocale() == 'ar' ? 'mr-auto' : '') }}">
                <a href="/admin/{{ $message['is_admin'] ? 'admin' : 'users' }}/{{ $message['user_id'] }}">
                    <p class="text-purple-800 dark:text-[#ff90f0] font-bold">
                        {{ $message['user_name'] }} {{ $message['is_admin'] ? ' (Admin)' : '' }}
                    </p>
                </a>
                {{-- Message Date --}}
                <div>
                    <p
                        class="{{ $message['is_admin'] ? '' : 'text-left' }}
                        text-neutral-600 dark:text-neutral-200 text-xs mb-3">
                        {{ $message['created_at'] }}
                    </p>
                </div>
            </div>
            <div class="mx-2 -mt-2">
                <form method="POST" action="/admin/customer-service/{{ $message['id'] }}">
                    @csrf
                    @method('DELETE')
                    <button
                        class="size-10 flex items-center justify-center rounded-full transition-all
                    hover:bg-rose-300"
                        type="submit"><x-fas-trash class="text-red-400 w-4" /></button>
                </form>
            </div>
        </div>
        {{-- Message Body --}}
        <div>
            <pre class="pre-default dark:text-white" dir="auto">{{ $message['message'] }}</pre>
        </div>
    </div>
</div>
