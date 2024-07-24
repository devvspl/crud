<x-layout>
    <div class="container mt-5">
        <label> <strong>Product Name:</strong> {{ $product->product_name }}</label>
        <br>
        <label> <strong>Description:</strong> {{ $product->description }}</label>
        <br>
        <button type="button" class="btn btn-secondary "><a class="text-white" href="/">Back</a></button>
    </div>
</x-layout>
