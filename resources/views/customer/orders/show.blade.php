@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Order Details</h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('customer.orders.index') }}" class="btn btn-primary mb-3">Back to My Orders</a>

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
                            <span class="badge bg-primary">{{ $order->status }}</span>
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

                    <div class="alert alert-info">
                        <strong>Order Status Information:</strong>
                        <ul>
                            <li>Pending: Your order has been received</li>
                            <li>Processing: Your order is being processed</li>
                            <li>Shipped: Your order has been shipped</li>
                            <li>Delivered: Your order has been delivered</li>
                            <li>Cancelled: Your order has been cancelled</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
