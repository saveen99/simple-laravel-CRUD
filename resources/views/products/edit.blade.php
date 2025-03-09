<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-blue-600 shadow-md py-4">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="{{ route('product.index') }}" class="text-white text-2xl font-bold">ProductStore</a>

            <!-- Go Back Button -->
            <a href="{{ route('product.index') }}" 
                class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 transition">
                Back to Products
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex-grow flex items-center justify-center p-6">
        <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-2xl">
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

                <!-- Row for Name, Quantity, and Price -->
                <div class="grid grid-cols-3 gap-4">
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
                </div>

                <!-- Row for Description -->
                <div>
                    <label class="block text-gray-700 font-medium">Description</label>
                    <textarea name="description" placeholder="Enter product description" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $product->description }}</textarea>
                </div>

                <!-- Update Button -->
                <div>
                    <button type="submit" 
                        class="w-full bg-green-500 text-white py-3 rounded-lg font-semibold hover:bg-green-600 transition duration-200">
                        Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white text-center py-4">
        <p>&copy; 2025 ProductStore. All rights reserved.</p>
    </footer>

</body>
</html>
