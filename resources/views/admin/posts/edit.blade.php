@extends("components.layouts")

@section("content")
    <section class="max-w-xl mxauto border border-gray-200 p-6 rounded-xl mx-auto mt-12">
        <h1 class="text-sm mb-4">Edit Post: <a href="/posts/{{$post->slug}}" class="font-bold text-lg hover:text-green-500">{{$post->title}}</a></h1>
        <form action="/admin/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-6">
                <label  class="block mb-2 uppercase font-bold text-xs text-gray-700"
               for="title">Title</label>
               <input type="text" name="title" value="{{old('title', $post->title)}}"
                class="border border-gray-400 p-2 w-full">

                @error('title')
                   <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
           </div>

           <div class="mb-6">
                <label  class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="slug">Slug</label>
                <input type="text" name="slug" value="{{old('slug', $post->slug)}}"
                class="border border-gray-400 p-2 w-full">

                @error('slug')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6 flex">
                <div class="flex-1">
                    <label  class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="thumbnail">Thumbnail</label>
                    <input type="file" name="thumbnail" value="{{old('thumbnail', $post->thumbnail)}}"
                    class="border border-gray-400 p-2 w-full">
                 </div>
                 <img class="rounded-xl ml-6" width="100" src="/storage/{{ $post->thumbnail }}" alt="image">
                @error('thumbnail')
                     <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

           <div class="mb-6">
                <label  class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="excerpt">Excerpt</label>
                <textarea name="excerpt" id="excerpt" class="border border-gray-400 p-2 w-full">
                    {{old('excerpt', $post->excerpt)}}
                </textarea>

                @error('excerpt')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label  class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="body">Body</label>
                <textarea name="body" id="body" class="border border-gray-400 p-2 w-full">
                    {{old('body', $post->body)}}
                </textarea>

                @error('body')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label  class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="category_id">Category</label>

                <select name="category_id" id="category_id">
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp

                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-10 hover:bg-blue-500">
                    Update
                </button>

            </div>

        </form>
    </section>
@endsection()
