@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Create New Order</h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('customer.orders.index') }}" class="btn btn-primary mb-3">Back to My Orders</a>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('customer.orders.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="total_amount">Total Amount:</label>
                            <input type="number" name="total_amount" class="form-control" placeholder="Enter amount"
                                step="0.01">
                        </div>

                        <div class="form-group mb-3">
                            <label for="notes">Notes:</label>
                            <textarea class="form-control" name="notes" rows="3" placeholder="Enter any special instructions"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Create Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
