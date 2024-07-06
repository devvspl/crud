<x-layout>
    <div class="container m-5">
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>
                    {{ $message  }}
                </strong>
            </div>
        @endif
        <form style="width: 500px" action="/edit-product/{{$product->id}}" method="post">
            @csrf
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" value="{{ old('product_name', $product->product_name) }}" class="form-control" id="product_name"  name="product_name"  placeholder="Enter product name">
                @error('product_name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <br>
                <textarea name="description" class="form-control"  id="description" cols="100%" rows="3" placeholder="Brief about product">{{ old('description', $product->description) }}</textarea>
                @error('description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-layout>
