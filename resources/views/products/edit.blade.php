<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-6">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Edit Product</h1>

        <!-- Display Error Messages -->
        @if($errors->any()) 
            <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error) 
                        <li>{{ $error }}</li>
                    @endforeach 
                </ul> 
            </div>
        @endif 

        <form method="POST" action="{{ route('product.update', ['product' => $product]) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700 font-medium">Name</label>
                <input type="text" name="name" placeholder="Enter product name" required value="{{ $product->name }}"
                       class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Qty</label>
                <input type="number" name="qty" placeholder="Enter quantity" required min="1" value="{{ $product->qty }}"
                       class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Price</label>
                <input type="number" name="price" placeholder="Enter price" required step="0.01" value="{{ $product->price }}"
                       class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Description</label>
                <textarea name="description" placeholder="Enter product description" required
                          class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $product->description }}</textarea>
            </div>

            <div>
                <button type="submit" 
                        class="w-full bg-green-500 text-white py-3 rounded-lg font-semibold hover:bg-green-600 transition duration-200">
                    Update Product
                </button>
            </div>
        </form>
    </div>

</body>
</html>
