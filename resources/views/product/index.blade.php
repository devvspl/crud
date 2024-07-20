<x-layout>
<div class="container mt-5">
    <div class="table-responsive">
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>
                    {{ $message  }}
                </strong>
            </div>
        @endif
        <a href="/create" class="btn btn-sm btn-dark mb-3">Add Product</a>
            <a href="/print"  style="float: right;" class="btn btn-sm btn-info mb-3">Download PDF</a>
        <table class="table">
            <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr class="text-center">
                    <th scope="row">{{ $products->firstItem() + $loop->iteration }}</th>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <div class="d-flex justify-content-center" style="gap: 5px;">
                            <a class="btn btn-sm btn-primary" href="product/view/{{$product->id}}" role="button">View</a>
                            <a class="btn btn-sm btn-info" href="product/edit/{{$product->id}}" role="button">Edit</a>
                            <a class="btn btn-sm btn-danger" href="product/delete/{{$product->id}}" role="button">Delete</a>
                        </div>

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {{ $products->links()}}
            <h1>All Routes</h1>
            <table border="1">
                <thead>
                <tr>
                    <th>URI</th>
                    <th>Name</th>
                    <th>Action</th>
                    <th>Methods</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($routes as $route)
                    <tr>
                        <td>{{ $route['uri'] }}</td>
                        <td>{{ $route['name'] }}</td>
                        <td>{{ $route['action'] }}</td>
                        <td>{{ implode(', ', $route['methods']) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br><br>
        {{ 5+5 }}
        <br><br>
        {{ "Hello world" }}
        <br><br>
        {!!  "<h1>My self devendra verma</h1>" !!}
        <br><br>
                @php
                $users = ['vikash', 'dev', 'sahil']
                    @endphp
            <ul>
            @foreach ($users as $user)
               @if($loop->first)
                        <li class="text-uppercase text-danger">  {{ $loop->iteration }} - {{  $user  }}</li>
                    @elseif($loop->last)
                        <li class="text-uppercase text-primary">  {{ $loop->iteration }} - {{  $user  }}</li>
               @endif

            @endforeach
            </ul>
            <ul>
            @foreach($users as $user)
                    {{ $loop->iteration }}
            @endforeach
            </ul>
    </div>
</div>
</x-layout>
