@props(['comment'])
<article class="flex bg-gray-50 border border-gray-200 p-6 rounded-xl space-x-4">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/100?u={{$comment->id}}" width="60" class="rounded-xl">
    </div>

    <div>
        <header class="mb-4">
            <h3>{{$comment->author->name}}</h3>

            <p class="text-xs">Posted
                <time>{{$comment->created_at->format('F j, Y, g:i a')}}</time>
            </p>
        </header>
        <p>
            {{$comment->body}}
        </p>
    </div>
</article>
