<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-gray-50 font-sans min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-blue-600 shadow-md py-4">
        <div class="container mx-auto px-6 flex items-center justify-between">
            <a href="{{ route('product.index') }}" class="text-white text-2xl font-bold">ProductStore</a>
            <div class="flex items-center space-x-4">
                <!-- Search Bar -->
                <input type="text" id="search" placeholder="Search products..." class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300 w-72 sm:w-80">

                <!-- Create Product Button -->
                <a href="{{ route('product.create') }}" class="px-4 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 transition">
                    + Create Product
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Section -->
    <div class="max-w-7xl mx-auto p-8 flex-grow">
        <div class="bg-white shadow-xl rounded-xl p-6">
            <h1 class="text-4xl font-bold text-center text-gray-800 mb-6">Products</h1>

            @if(session()->has('success'))
                <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Product Table (Fixed width) -->
            <div id="productTable" class="overflow-x-auto w-full max-w-full">
                @include('products.partials.product-list', ['products' => $products])
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white text-center py-4">
        <p>&copy; 2025 ProductStore. All rights reserved.</p>
    </footer>

    <script>
        $(document).ready(function () {
            $("#search").on("keyup", function () {
                let query = $(this).val();
                $.ajax({
                    url: "{{ route('product.search') }}",
                    type: "GET",
                    data: { search: query },
                    success: function (data) {
                        $("#productTable").html(data.products);
                    }
                });
            });
        });

        function confirmDelete(event) {
            event.preventDefault();
            if (confirm("Are you sure you want to delete this product?")) {
                event.target.closest("form").submit();
            }
        }
    </script>

</body>

</html>
