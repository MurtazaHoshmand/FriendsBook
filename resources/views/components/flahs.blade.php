@if (session()->has('success'))
    <div x-data="{show:true}"
    x-init="setTimeout(() => show = false, 4000)"
    x-show="show"
    class="fixed bg-green-300 py-4 px-2 rounded-xl bottom-3 text-sm text-white">
        <p>{{session('success')}}</p>
    </div>
@endif
