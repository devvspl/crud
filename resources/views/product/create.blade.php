<x-layout>
    <div class="container m-5">
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>
                        {{ $message  }}
                    </strong>
                </div>
            @endif
        <form style="width: 500px" action="/save-product" method="post">
            @csrf
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" value="{{ old('product_name') }}" class="form-control" id="product_name"  name="product_name"  placeholder="Enter product name">
                @error('product_name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <br>
                <textarea name="description" value="{{ old('description') }}"  class="form-control"  id="description" cols="100%" rows="3" placeholder="Brief about product"></textarea>
                @error('description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary "><a class="text-white" href="/">Back</a></button>
        </form>
    </div>
</x-layout>
