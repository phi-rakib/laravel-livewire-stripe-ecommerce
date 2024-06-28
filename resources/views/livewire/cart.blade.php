<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="float-left">
                <h1>Cart</h1>
            </div>
            <div class="float-right">
                <a href="{{ route('products.index')}}" class="btn btn-primary">Continue Shopping</a>
            </div>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['price'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ $item['price'] * $item['quantity'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <div class="float-right">
                <a href="{{ route('checkout')}}" class="btn btn-warning">Checkout</a>
            </div>
        </div>
    </div>
</div>