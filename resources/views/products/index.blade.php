<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-6">

    <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-4xl">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Products</h1>

        @if(session()->has('success')) 
            <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                {{ session('success') }} 
            </div>
        @endif 

        <div class="mb-4 flex justify-end">
            <a href="{{ route('product.create') }}" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">
                + Create a Product
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 text-left">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="border border-gray-300 px-4 py-3">ID</th>
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
                        <td class="border border-gray-300 px-4 py-3">{{$product->id}}</td>
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
                            <form method="POST" action="{{ route('product.destroy', ['product' => $product]) }}" onsubmit="return confirmDelete()">
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
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this product?");
        }
    </script>

</body>
</html>
