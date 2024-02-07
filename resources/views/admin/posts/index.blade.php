@extends("components.layouts")

@section("content")
    <section class="max-w-xl mxauto border border-gray-200 p-6 rounded-xl mx-auto mt-12">
        <h1 class="text-lg font-bold mb-4">All Posts</h1>
        <table class="min-w-full divide-y divide-gray-200 ">
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($posts as $post)
                    <tr>
                        <td class="py-4 ">
                            <div class="flex item-center">
                                <a href="/posts/{{$post->slug}}" class="text-sm font-medium text-gray-900">{{$post->title}}</a>
                            </div>
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="/admin/posts/{{$post->id}}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                        </td>

                        <td class="py-4 whitespace-nowrap text-right text-sm font-medium">
                            <form action="/admin/posts/{{$post->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-xs text-gray-400">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </section>
@endsection()
