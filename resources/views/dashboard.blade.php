<x-app-layout>
    <div class="py-4">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400 mx-auto justify-center">
                        
                        <li class="me-2">
                            <a href="#"  class="inline-block px-4 py-1 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">
                                All
                            </a>
                        </li>
                       
                            <x-category :category="$category"></x-category>    
                        
                        
                        
                    </ul>
                </div>
            </div>

            <div class="mt-8 text-gray-900">
                <div class="p-4 ">
                @forelse ($posts as $post)

                    <x-post-item :post="$post"></x-post-item>
                    
                @empty
                    <div>
                        <p class="text-gray-900">No posts found.</p>
                    </div>
                    
                @endforelse

                
            </div>
            {{ $posts->onEachSide(1)->links() }}
        </div>
    </div>
</x-app-layout>