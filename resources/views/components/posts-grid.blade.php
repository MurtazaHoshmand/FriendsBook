@props(['posts'])
{{-- displaying the most late post --}}
<x-post-featured-card :post="$posts[0]"/>

{{-- displaying the remaining posts --}}
@if ($posts->count() > 1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach ($posts->skip(1) as $post )
            {{-- logic that scond row must contains 2 posts --}}
            <x-post-card
                :post="$post"
                class="{{$loop->iteration < 3 ? 'col-span-3' : 'col-span-2'}}"
             />
        @endforeach

    </div>
@endif
