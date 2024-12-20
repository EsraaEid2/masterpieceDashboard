@extends('layouts.master')

@section('title', 'Orders')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>View Orders</h4>
        </div>

        <!-- Search Form -->
        <form method="GET" action="{{ url('admin/categories') }}"
            class="mb-4 mt-4 d-flex justify-content-between align-items-center">
            <div class="input-group w-50">
                <input type="text" class="form-control border-primary rounded-pill py-2" name="search"
                    placeholder="Search Orders" value="{{ request('search') }}">
                <button class="btn btn-primary rounded-pill px-4" type="submit">
                    Search
                </button>
            </div>
        </form>

        <div class="card-body">
            <table class="table table-bordered table-hover text-center align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>Order ID</th>
                        <th>User</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td> {{ $order->user->first_name . ' ' . $order->user->last_name  }}</td>
                        <td>${{ $order->total_price }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>{{ $order->created_at->format('d-m-Y H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-primary btn-sm"
                                data-bs-toggle="modal" data-bs-target="#viewOrderModal{{ $order->id }}">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="#" class="text-success mx-2" title="Edit" data-bs-toggle="modal"
                                data-bs-target="#editOrderStatusModal{{ $order->id }}">
                                <i class="fas fa-edit fa-lg"></i>
                            </a>
                        </td>
                    </tr>

                    <!-- View Order Modal -->
                    <div class="modal fade" id="viewOrderModal{{ $order->id }}" tabindex="-1"
                        aria-labelledby="viewOrderModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewOrderModalLabel">Order Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                                    <p><strong>Order ID:</strong> {{ $order->id }}</p>
                                    <p><strong>User Details:</strong>
                                        {{ $order->user->first_name . ' ' . $order->user->last_name  }}
                                        ({{ $order->user->email }})</p>
                                    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                                    <p><strong>Total Price:</strong> JOD {{ $order->total_price }}</p>
                                    <p><strong>Placed At:</strong> {{ $order->created_at->format('d-m-Y') }}</p>

                                    <h3>Items</h3>

                                    <div class="row">
                                        @foreach ($order->orderItems as $item)
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        {{ $item->product ? $item->product->title : 'No Title Available' }}
                                                    </h5>
                                                    <p><strong>Quantity:</strong> {{ $item->quantity }}</p>
                                                    <p><strong>Price:</strong> ${{ $item->price_at_time }}</p>
                                                    <p><strong>Total:</strong> ${{ $item->total_price }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Order Status Modal -->
                    <div class="modal fade" id="editOrderStatusModal{{ $order->id }}" tabindex="-1"
                        aria-labelledby="editOrderStatusModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editOrderStatusModalLabel">Update Order Status</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Order Information -->
                                    <form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <!-- Order ID (Read-only) -->
                                        <div class="mb-3">
                                            <label for="orderId" class="form-label">Order ID</label>
                                            <input type="text" class="form-control" id="orderId"
                                                value="{{ $order->id }}" disabled>
                                        </div>

                                        <!-- Current Status (Display current status, not editable) -->
                                        <div class="mb-3">
                                            <label for="currentStatus" class="form-label">Current Status</label>
                                            <input type="text" class="form-control" id="currentStatus"
                                                value="{{ ucfirst($order->status) }}" disabled>
                                        </div>

                                        <!-- Status Dropdown (Editable) -->
                                        <div class="mb-3">
                                            <label for="status" class="form-label">New Status</label>
                                            <select class="form-select" id="status" name="status" required>
                                                <option value="pending"
                                                    {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="processing"
                                                    {{ $order->status == 'processing' ? 'selected' : '' }}>Processing
                                                </option>
                                                <option value="delivered"
                                                    {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered
                                                </option>
                                                <option value="cancelled"
                                                    {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled
                                                </option>
                                            </select>
                                        </div>

                                        <!-- Save and Cancel buttons -->
                                        <div class="d-flex justify-content-between">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                    @empty
                    <tr>
                        <td colspan="6">No orders found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-3">
                {{ $orders->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

@endsection