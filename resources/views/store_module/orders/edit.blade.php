@extends('layouts.base')

@section('title', 'Edit Order No. #' . $order->id)

@section('content')

    <h1>Edit Order No. #{{$order->id}}</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::model($order, array('route' => array('orders.update', $order->id), 'method' => 'PUT', 'files' => true)) }}

    <div class="form-group">
        {{ Form::label('supplier_id', 'Supplier') }}
        {{ Form::select('supplier_id', $suppliers, null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('employee_id', 'Employee') }}
        {{ Form::select('employee_id', $employees, null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('issued_at', 'Date') }}
        {{ Form::date('issued_at', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('status', 'Status') }}
        {{ Form::select('status', ['awaiting' => 'Awaiting Supplier Delivery', 'online' => 'Processing Online', 'received' => 'Received at department store', 'stored' => 'Sent to main store'], null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('payment_receipt', 'Payment Receipt') }}
        {{ Form::file('payment_receipt', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('tax', 'Tax') }}
        {{ Form::text('tax', null, array('class' => 'form-control')) }}
    </div>

    <h3 class="float-left mt-4">Products</h3>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success float-right mt-4 mb-4" data-toggle="modal" data-target="#addProduct"><i class="fas fa-plus mr-2"></i>Add Product</button><br>

    <div class="clearfix"></div>

    @if(count($order->products) > 0)

    <table class="table data-table">

        <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($order->products as $order_product)
            <tr>
                <td>{{ $order_product->name }}</td>
                <td>{{ $order_product->pivot->quantity }}</td>
                <td>{{ $order_product->pivot->unit_price }}</td>
                <td><a href="#" class="btn btn-outline-danger btnRemoveProduct" data-product-id="{{ $order_product->id }}">Remove</a></td>
            </tr>
        @endforeach
        </tbody>

    </table>

    @else

    <p>No products.</p>

    @endif

    {{ Form::submit('Update Order', array('class' => 'btn btn-primary btn-block btn-lg mt-5')) }}

    {{ Form::close() }}

    <!-- add product modal -->
    <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="product_id" class="col-form-label">Product</label>
                        <select type="text" name="product_id" class="form-control" id="product_id">
                            @foreach($products as $product_id => $product_name)
                                <option value="{{ $product_id }}">{{ $product_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="quantity" class="col-form-label">Quantity</label>
                        <input type="text" name="quantity" id="quantity" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="unit_price" class="col-form-label">Unit Price</label>
                        <input type="text" name="unit_price" id="unit_price" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                    <button type="button" id="btnAddProduct" class="btn btn-success">Add Product</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    @parent

    <script>
        function validate_form(id, qty, price) {
            // validate the form
            if(! id) {
                alert('Product is required');
            }

            if(! qty) {
                alert('Quantity is required');
            } else if(isNaN(qty)) {
                alert('Quantity should be a number');
            }

            if(! price) {
                alert('Unit price is required');
            } else if(isNaN(price)) {
                alert('Unit price should be a number');
            }
        }

        function submit_form(action, product_id, quantity, unit_price) {
            // submit the form
            $.ajax({
                url: '{{ route('orders.edit', $order->id) }}',
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {action: action, product_id: product_id, quantity: quantity, unit_price: unit_price},
                success: function(data) {
                    // redirect to the same page
                    window.location.replace('{{ route('orders.edit', $order->id) }}');
                },
                error: function(msg) {
                    //alert(msg);
                }
            });
        }

        // submit product through ajax
        $(document).ready(function() {
            $('#btnAddProduct').click(function() {
                // get user data
                let product_id = $('#product_id').val();
                let quantity = $('#quantity').val();
                let unit_price = $('#unit_price').val();

                validate_form(product_id, quantity, unit_price);

                submit_form('add', product_id, quantity, unit_price);
            });

            $('.btnRemoveProduct').click(function(e) {
                e.preventDefault();

                let product_id = $(this).attr('data-product-id');

                submit_form('remove', product_id, null, null);
            });
        });
    </script>
@endsection
