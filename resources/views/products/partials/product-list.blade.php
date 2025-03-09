<div class="overflow-x-auto">
    <table class="w-full border-collapse border border-gray-300 text-left">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="border border-gray-300 px-4 py-3">Name</th>
                <th class="border border-gray-300 px-4 py-3">Qty</th>
                <th class="border border-gray-300 px-4 py-3">Price</th>
                <th class="border border-gray-300 px-4 py-3">Description</th>
                <th class="border border-gray-300 px-4 py-3">Edit</th>
                <th class="border border-gray-300 px-4 py-3">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="bg-white border-b hover:bg-gray-100 transition">
                <td class="border border-gray-300 px-4 py-3">{{$product->name}}</td>
                <td class="border border-gray-300 px-4 py-3">{{$product->qty}}</td>
                <td class="border border-gray-300 px-4 py-3">{{$product->price}}</td>
                <td class="border border-gray-300 px-4 py-3">{{$product->description}}</td>
                <td class="border border-gray-300 px-4 py-3">
                    <a href="{{ route('product.edit', ['product' => $product]) }}" 
                       class="text-blue-600 hover:text-blue-800 font-semibold">
                        Edit
                    </a> 
                </td>
                <td class="border border-gray-300 px-4 py-3">
                    <form method="POST" action="{{ route('product.destroy', ['product' => $product]) }}" onsubmit="confirmDelete(event)">
                        @csrf 
                        @method('delete') 
                        <button type="submit" class="px-3 py-1 bg-red-500 text-white font-semibold rounded-md hover:bg-red-600 transition">
                            Delete
                        </button>
                    </form>
                </td> 
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
