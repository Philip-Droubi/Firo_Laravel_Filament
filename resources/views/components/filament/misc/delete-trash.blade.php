<form method="POST" action="{{ $link }}">
    @csrf
    @method('DELETE')
    <button
        class="btn-delete size-10 flex items-center justify-center rounded-full transition-all
        hover:bg-rose-300">
        <x-fas-trash class="text-red-400 w-4" />
    </button>
</form>
