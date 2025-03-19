@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Orders List</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('orders.create') }}" class="btn btn-success mb-3">Create New Order</a>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Order Number</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->order_number }}</td>
                                        <td>${{ number_format($order->total_amount, 2) }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('orders.show', $order->id) }}">Show</a>
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('orders.edit', $order->id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {!! $orders->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
