
@foreach ($categories as $category)
    <div>
        <li class="me-2">
                <a href="#" class="inline-block px-4 py-1 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">
                                        
                    {{ $category->name }}
                </a>
                                    
        </li>
    </div>
@endforeach