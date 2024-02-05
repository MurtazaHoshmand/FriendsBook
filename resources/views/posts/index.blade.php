@extends("components.layouts")

@section("content")
@include('posts._header')

<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

    {{-- check for the post existence --}}
    @if ($posts->count())
        <x-posts-grid :posts="$posts"/>
    @else
        <p class="text-center">No post yet. please check later.</p>
    @endif

</main>
@endsection




















{{-- @foreach ($posts as $post)
    <article>
        <h1>
            <!-- display the title and take care about showing the specific post-->
            <a href="/posts/{{$post->slug}}">
                {{$post->title}}
            </a>
        </h1>

        <p>                                                
            By <a href="/authors/{{$post->author->user_name}}">{{$post->author->name}}</a> in
            <!-- we send to category, the slug of category's post -->
            <a href="/categories/{{$post->category->slug}}">
                {{$post->category->name}}
            </a>
         </p>

        <div>
            {{$post->excerpt}}
        </div>
    </article>
@endforeach --}}