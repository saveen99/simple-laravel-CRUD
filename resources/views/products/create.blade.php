<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-blue-600 shadow-md py-4">
        <div class="container mx-auto px-6 flex items-center justify-between">
            <a href="{{ route('product.index') }}" class="text-white text-2xl font-bold">ProductStore</a>
            <div class="flex items-center space-x-4">
                <a href="{{ route('product.index') }}" class="px-4 py-2 bg-gray-600 text-white font-semibold rounded-md hover:bg-gray-700 transition">
                    Back to Products
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Section -->
    <div class="max-w-4xl mx-auto p-8 flex-grow">
        <div class="bg-white shadow-xl rounded-xl p-8">
            <h1 class="text-3xl font-semibold text-center text-gray-800 mb-8">Create a Product</h1>

            <!-- Display Error Messages -->
            @if($errors->any())
                <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('product.store') }}" class="space-y-6">
                @csrf
                @method('post')

                <!-- Single Line Fields: Name, Quantity, Price -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <!-- Name Field -->
                    <div class="col-span-1">
                        <label for="name" class="block text-gray-700 font-medium">Product Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter product name" required
                               class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- Quantity Field -->
                    <div class="col-span-1">
                        <label for="qty" class="block text-gray-700 font-medium">Quantity</label>
                        <input type="number" id="qty" name="qty" placeholder="Enter quantity" required min="1"
                               class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- Price Field -->
                    <div class="col-span-1">
                        <label for="price" class="block text-gray-700 font-medium">Price</label>
                        <input type="number" id="price" name="price" placeholder="Enter price" required step="0.01"
                               class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <!-- Description Field (Full width) -->
                <div>
                    <label for="description" class="block text-gray-700 font-medium">Description</label>
                    <textarea id="description" name="description" placeholder="Enter product description" required
                              class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <div>
                    <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-200">
                        Save Product
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
