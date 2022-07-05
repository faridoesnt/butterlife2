@extends('layouts.dashboard')

@section('title')
    Dashboard Transactions Butterlife
@endsection

@section('content')
    <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
        <div class="container-fluid">
            <div class="dashboard-heading">
            <h2 class="dashboard-title">Transactions</h2>
            <p class="dashboard-subtitle">Look what you have made today!</p>
            </div>
            <div class="dashboard-content">
            <div class="row">
                <div class="col-12 mt-2">
                    @foreach ($transactions_data as $transaction)
                        <a href="{{ route('dashboard-transaction-details', $transaction->id) }}" class="card card-list d-block">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img
                                            src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                                            class="w-75"
                                        />
                                    </div>
                                    <div class="col-md-4">{{ $transaction->product->name ?? '' }}</div>
                                    @if ($transaction->transaction->transaction_status == 'PENDING')
                                        <div class="col-md-3 text-danger">{{ $transaction->transaction->transaction_status }}</div>
                                    @elseif ($transaction->transaction->transaction_status == 'CANCELLED')
                                        <div class="col-md-3 text-danger">{{ $transaction->transaction->transaction_status }}</div>
                                    @else
                                        <div class="col-md-3 text-success">{{ $transaction->transaction->transaction_status }}</div>
                                    @endif
                                    <div class="col-md-3">{{ $transaction->transaction->code ?? '' }}</div>
                                    <div class="col-md-1">
                                    <img src="/images/arrow.svg" alt="" />
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="row mt-2">
                {{ $transactions_data->links() }}
            </div>
            </div>
        </div>
    </div>
@endsection