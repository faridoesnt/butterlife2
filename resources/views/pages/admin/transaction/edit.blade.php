@extends('layouts.admin')

@section('title')
    Admin Transactions Butterlife
@endsection

@section('content')
    <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
        <div class="container-fluid">
            <div class="dashboard-heading">
            <h2 class="dashboard-title">Transactions</h2>
            <p class="dashboard-subtitle">Edit Transactions</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('transactions.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Code</label>
                                                <input class="form-control" value="{{ $item->transaction->code }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Product</label>
                                                <input class="form-control" value="{{ $item->product->name }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Size</label>
                                                <input class="form-control" value="{{ $item->size }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Qty</label>
                                                <input class="form-control" value="{{ $item->qty }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Product Price</label>
                                                <input class="form-control" value="{{ number_format($item->price) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Total Product Price</label>
                                                <input class="form-control" value="{{ number_format($item->transaction->product_price) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Shipping Price</label>
                                                <input class="form-control" value="{{ number_format($item->transaction->shipping_price) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Total Price</label>
                                                <input class="form-control" value="{{ number_format($item->transaction->total_price) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Courier</label>
                                                <input class="form-control" value="{{ $item->courier }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Service</label>
                                                <input class="form-control" value="{{ $item->service }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Payment Status</label>
                                                <input class="form-control" value="{{ $item->transaction->transaction_status }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Resi</label>
                                                @if ($item->shipping_status == 'PENDING')
                                                    <input type="text" name="resi" class="form-control" value="{{ $item->resi }}">
                                                @elseif ($item->shipping_status == 'SHIPPING')
                                                    <input class="form-control" value="{{ $item->resi }}" disabled>
                                                @else
                                                    <input class="form-control" value="{{ $item->resi }}" disabled>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Shipping Status</label>
                                                <select name="shipping_status" class="form-control">
                                                    @if ($item->shipping_status == 'PENDING')
                                                        <option value="{{ $item->shipping_status }}" selected>{{ $item->shipping_status }}</option>
                                                        <option value="SHIPPING">SHIPPING</option>
                                                    @elseif ($item->shipping_status == 'SHIPPING')
                                                        <option value="{{ $item->shipping_status }}" selected>{{ $item->shipping_status }}</option>
                                                        <option value="SUCCESS">SUCCESS</option>
                                                    @else
                                                        <option selected disabled>{{ $item->shipping_status }}</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-dark px-5">
                                                Save Now
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection