@extends('layouts.base')

@section('title', 'Edit dispatch request no: ' . $dispatch->id)

@section('content')

    <h1>Edit dispatch request no #{{$dispatch->id}}</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::model($dispatch, array('route' => array('dispatches.update', $dispatch->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('department_id', 'Department') }}
        {{ Form::select('department_id', $departments, null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('employee_id', 'Employee') }}
        {{ Form::select('employee_id', $employees, null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('request_date', 'Date') }}
        {{ Form::date('request_date', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('status', 'Status') }}
        {{ Form::select('status', ['new' => 'New', 'delivered' => 'Delivered', 'rejected' => 'Rejected', 'processed' => 'Processed', 'received' => 'Received'], null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('rejection_reason', 'Rejection Reason') }}
        {{ Form::textarea('rejection_reason', null, array('class' => 'form-control')) }}
    </div>

    <h3 class="float-left mt-4">Products</h3>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success float-right mt-4 mb-4" data-toggle="modal" data-target="#addProduct"><i class="fas fa-plus mr-2"></i>Add Product</button><br>

    <div class="clearfix"></div>

    @if(count($dispatch->products) > 0)

        <table class="table data-table">

            <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($dispatch->products as $dispatch_product)
                <tr>
                    <td>{{ $dispatch_product->name }}</td>
                    <td>{{ $dispatch_product->pivot->quantity }}</td>
                    <td><a href="#" class="btn btn-outline-danger btnRemoveProduct" data-product-id="{{ $dispatch_product->id }}">Remove</a></td>
                </tr>
            @endforeach
            </tbody>

        </table>

    @else

        <p>No products.</p>

    @endif

    {{ Form::submit('Update Dispatch', array('class' => 'btn btn-primary btn-block btn-lg mt-5')) }}

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
        function validate_form(id, qty) {
            // validate the form
            if(! id) {
                alert('Product is required');
            }

            if(! qty) {
                alert('Quantity is required');
            } else if(isNaN(qty)) {
                alert('Quantity should be a number');
            }
        }

        function submit_form(action, product_id, quantity) {
            // submit the form
            $.ajax({
                url: '{{ route('dispatches.edit', $dispatch->id) }}',
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {action: action, product_id: product_id, quantity: quantity},
                success: function(data) {
                    // redirect to the same page
                    window.location.replace('{{ route('dispatches.edit', $dispatch->id) }}');
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

                validate_form(product_id, quantity);

                submit_form('add', product_id, quantity);
            });

            $('.btnRemoveProduct').click(function(e) {
                e.preventDefault();

                let product_id = $(this).attr('data-product-id');

                submit_form('remove', product_id, null);
            });
        });
    </script>
@endsection
