@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Order</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('orders.index') }}" class="btn btn-primary mb-3">Back to List</a>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('orders.update', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="order_number">Order Number:</label>
                                <input type="text" name="order_number" value="{{ $order->order_number }}"
                                    class="form-control" placeholder="Order Number">
                            </div>

                            <div class="form-group mb-3">
                                <label for="total_amount">Total Amount:</label>
                                <input type="number" name="total_amount" value="{{ $order->total_amount }}"
                                    class="form-control" placeholder="Total Amount" step="0.01">
                            </div>

                            <div class="form-group mb-3">
                                <label for="status">Status:</label>
                                <select name="status" class="form-control">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>
                                        Processing</option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>
                                        Completed</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                        Cancelled</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="notes">Notes:</label>
                                <textarea class="form-control" name="notes" rows="3" placeholder="Notes">{{ $order->notes }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
