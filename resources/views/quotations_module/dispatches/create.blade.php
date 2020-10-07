@extends('layouts.base')

@section('title', 'Add New Dispatch Request')

@section('content')

    <h1>Add Dispatch Request</h1>
    <hr>

    @include ('partials.errors.list')

    {{ Form::open(array('url' => 'dispatches')) }}

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
        {{ Form::date('request_date', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('status', 'Status') }}
        {{ Form::select('status', ['new' => 'New', 'delivered' => 'Delivered', 'rejected' => 'Rejected', 'processed' => 'Processed', 'received' => 'Received'], 'new', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('rejection_reason', 'Rejection Reason') }}
        {{ Form::textarea('rejection_reason', '', array('class' => 'form-control')) }}
    </div>

    <h3 class="mt-5">Products</h3>

    <table class="table data-table mb-5">

        <thead>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        <!-- will be added dynamically using js -->
        </tbody>

    </table>

    <div class="form-group form-inline">
        {{ Form::label('product', 'Product', ['class' => 'mr-2']) }}
        {{ Form::select('product', $products, null, array('class' => 'form-control mr-5')) }}

        {{ Form::label('qty', 'Quantity', ['class' => 'mr-2']) }}
        {{ Form::text('qty', null, array('class' => 'form-control mr-5')) }}

        <button type="button" class="btn btn-success ml-4" id="btnAddProduct"><i class="fas fa-plus mr-2"></i>Add Product</button><br>
    </div>

    {{ Form::submit('Save Dispatch', array('class' => 'btn btn-primary btn-block btn-lg mt-5')) }}

    {{ Form::close() }}

@endsection

@section('scripts')
    @parent

    <script>
        $(document).ready(function() {
            $('#btnAddProduct').click(function(e) {
                e.preventDefault();

                // get fields values
                let product_name = $('#product option:selected').text();
                let product_id = $('#product').val();
                let quantity = $('#qty').val();
                let validation_errors = [];

                // validate data
                if(! product_id) {
                    // alert('Product is required');
                    validation_errors.push('Product is required');
                }

                if(! quantity) {
                    // alert('Quantity is required');
                    validation_errors.push('Quantity is required');
                } else if(isNaN(quantity)) {
                    // alert('Quantity should be a number');
                    validation_errors.push('Quantity should be a number');
                }

                let row = `
                <tr>
                    <td>${product_name}</td>
                    <td>${quantity}</td>
                    <td><a href="#" class="btn btn-outline-danger btnRemoveProduct" data-product-id="${product_id}">Remove</a></td>
                    <input type="hidden" name="products[${product_id}][product_id]" value="${product_id}">
                    <input type="hidden" name="products[${product_id}][quantity]" value="${quantity}">
                </tr>
                `;

                if(! Array.isArray(validation_errors) || ! validation_errors.length) {
                    // create a row in the table
                    $(".data-table tbody").append(row);

                    // clear fields
                    $('#product').val(1);
                    $('#qty').val('');
                } else {
                    let errors = '';

                    for (i = 0; i < validation_errors.length; i++) {
                        errors += validation_errors[i] + '\n';
                    }

                    alert('Correct the following errors: \n\n' + errors);
                }
            });

            $('.data-table tbody').on('click', 'a', function(e) {
                e.preventDefault();

                $(this).parents('tr').remove();
            });
        });
    </script>
@endsection
