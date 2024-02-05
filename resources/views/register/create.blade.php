@extends("components.layouts")

@section("content")

    <section class="px-6 py-8 ">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register!</h1>

            <form action="/register" method="post" class="mt-10">
                @csrf
                <div class="mb-6">
                    <label  class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="name">Name</label>

                    <input type="text" name="name"
                     class="border border-gray-400 p-2 w-full" value="{{old('name')}}">

                     @error('name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror
                </div>

                <div class="mb-6">
                    <label  class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="user_name">Username</label>

                    <input type="text" name="user_name" value="{{old('user_name')}}"
                     class="border border-gray-400 p-2 w-full">

                     @error('user_name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror
                </div>

                <div class="mb-6">
                    <label  class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="email">Email</label>

                    <input type="email" name="email" value="{{old('email')}}"
                     class="border border-gray-400 p-2 w-full">

                     @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror
                </div>

                <div class="mb-6">
                     <label  class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="password">Password</label>
                    <input type="password" name="password" value="{{old('password')}}"
                     class="border border-gray-400 p-2 w-full">

                     @error('password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror
                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Submit
                    </button>

                </div>
            </form>
        </main>
    </section>

@endsection
