<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(Auth::check() && Auth::user()->usertype == 'admin')
                {{__('Admin Dashboard')}}
            @else
                {{__('User Dashboard')}}
            @endif
        </h2>
    </x-slot>

    @section('content')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                      

                        <h2 class="text-2xl font-semibold text-gray-800 mb-8 text-center border-b pb-3">
                            ✍️ Update Blog Post
                        </h2>

                        <form action="{{ route('admin.postupdate', $post->id) }}" method="POST" enctype="multipart/form-data"
                            class="space-y-6">
                            @csrf

                        
                            <div>
                                <label for="title" class="block text-gray-700 font-medium mb-2">Post Title</label>
                                <input type="text" name="title" id="title" value="{{ $post->title }}"
                                    placeholder="Enter your post title here..."
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-blue-400 focus:ring-2 focus:ring-blue-200 outline-none transition">
                            </div>

                          
                            <div>
                                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                                <textarea name="description" id="description"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-blue-400 focus:ring-2 focus:ring-blue-200 outline-none resize-none transition">
                                    {{ $post->description }}
                                    </textarea>
                            </div>

                       
                            <div>
                                <img src="{{ asset('img/'.$post->image) }}" >
                                <label for="image" class="block text-gray-700 font-medium mb-2">Upload Image</label>
                                <input type="file" name="image" id="image"
                                    class="block w-full text-gray-700 border border-gray-300 rounded-lg px-4 py-2.5 bg-gray-50 focus:border-blue-400 focus:ring-2 focus:ring-blue-200 outline-none transition cursor-pointer">
                                    
                            </div>

                     
                            <div class="text-center pt-2">
                                <button type="submit" name="submit"
                                    class="px-8 py-2.5 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 hover:shadow-lg transition duration-200">
                                    🚀 Update Post
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>