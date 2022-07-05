@extends('layouts.dashboard')

@section('title')
    Dashboard Transactions Details Butterlife
@endsection

@section('content')
    <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
        <div class="container-fluid">
            <div class="dashboard-heading">
            <h2 class="dashboard-title">{{ $transaction_data->transaction->code }}</h2>
            <p class="dashboard-subtitle">Transaction Details</p>
            </div>
            <div class="dashboard-content" id="transactionDetails">
            <div class="row">
                <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <img src="{{ Storage::url($transaction_data->product->galleries->first()->photos ?? '') }}" alt="" class="w-100 mb-3"/>
                        </div>
                        <div class="col-12 col-md-8">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="product-title">Code Details</div>
                                <div class="product-subtitle">{{ $transaction_data->code }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="product-title">Product Name</div>
                                <div class="product-subtitle">{{ $transaction_data->product->name }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="product-title">Size</div>
                                <div class="product-subtitle">{{ $transaction_data->size }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="product-title">Qty</div>
                                <div class="product-subtitle">{{ $transaction_data->qty }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="product-title">Product Price</div>
                                <div class="product-subtitle">Rp. {{ number_format($transaction_data->price) }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="product-title">Total Product Price</div>
                                <div class="product-subtitle">Rp. {{ number_format($transaction_data->transaction->product_price) }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="product-title">Shipping Price</div>
                                <div class="product-subtitle">Rp. {{ number_format($transaction_data->transaction->shipping_price) }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="product-title">Total Amount</div>
                                <div class="product-subtitle">Rp. {{ number_format($transaction_data->transaction->total_price) }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="product-title">Payment Status</div>
                                @if ($transaction_data->transaction->transaction_status == 'PENDING')
                                    <div class="product-subtitle text-danger">{{ $transaction_data->transaction->transaction_status }}</div>
                                @else
                                    <div class="product-subtitle text-success">{{ $transaction_data->transaction->transaction_status }}</div>
                                @endif
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-4">
                            <h5>Shipping Information</h5>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="product-title">Address I</div>
                                    <div class="product-subtitle">{{ $transaction_data->transaction->user->address_one }}</div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="product-title">Address II</div>
                                    <div class="product-subtitle">{{ $transaction_data->transaction->user->address_two }}</div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="product-title">Province</div>
                                    <div class="product-subtitle">{{ $transaction_data->transaction->user->province->name ?? ''}}</div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="product-title">City</div>
                                    <div class="product-subtitle">{{ $transaction_data->transaction->user->regencies->name ?? ''}}</div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="product-title">Postal Code</div>
                                    <div class="product-subtitle">{{ $transaction_data->transaction->user->zip_code }}</div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="product-title">Country</div>
                                    <div class="product-subtitle">{{ $transaction_data->transaction->user->country }}</div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="product-title">Courier</div>
                                    <div class="product-subtitle">{{ $transaction_data->courier }}</div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="product-title">Service</div>
                                    <div class="product-subtitle">{{ $transaction_data->service }}</div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="product-title">Shipping Status</div>
                                @if ($transaction_data->shipping_status == 'PENDING')
                                    <div class="product-subtitle text-danger">{{ $transaction_data->shipping_status }}</div>
                                @elseif ($transaction_data->shipping_status == 'SHIPPING')
                                    <div class="product-subtitle text-primary">{{ $transaction_data->shipping_status }}</div>
                                @else
                                    <div class="product-subtitle text-success">{{ $transaction_data->shipping_status }}</div>
                                @endif
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="product-title">Resi</div>
                                    <div class="product-subtitle">{{ $transaction_data->resi }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 text-right">
                        <a
                            href="{{ route('dashboard-transaction') }}"
                            class="btn btn-dark btn-lg mt-4"
                        >
                            Back
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection

{{-- @push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
      var transactionDetails = new Vue({
        el: "#transactionDetails",
        data: {
          status: "SHIPPING",
          resi: "0101010101",
        },
      });
    </script>
@endpush --}}