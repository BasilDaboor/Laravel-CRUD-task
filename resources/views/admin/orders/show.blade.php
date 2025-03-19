@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Order Details</h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-primary mb-3">Back to List</a>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Order Number:</strong>
                            {{ $order->order_number }}
                        </div>
                        <div class="col-md-6">
                            <strong>Total Amount:</strong>
                            ${{ number_format($order->total_amount, 2) }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Status:</strong>
                            {{ $order->status }}
                        </div>
                        <div class="col-md-6">
                            <strong>Created At:</strong>
                            {{ $order->created_at->format('Y-m-d H:i:s') }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <strong>Notes:</strong>
                            {{ $order->notes ?? 'No notes available' }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-primary">Edit Status</a>
                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
