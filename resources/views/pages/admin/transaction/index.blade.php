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
            <p class="dashboard-subtitle">List of Transactions</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Code</th>
                                                <th>Code Details</th>
                                                <th>Product</th>
                                                <th>Size</th>
                                                <th>Qty</th>
                                                <th>Product Price</th>
                                                <th>Total Product Price</th>
                                                <th>Shipping Price</th>
                                                <th>Total Price</th>
                                                <th>Courier</th>
                                                <th>Service</th>
                                                <th>Payment Status</th>
                                                <th>Resi</th>
                                                <th>Shipping Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Code</th>
                                                <th>Code Details</th>
                                                <th>Product</th>
                                                <th>Size</th>
                                                <th>Qty</th>
                                                <th>Product Price</th>
                                                <th>Total Product Price</th>
                                                <th>Shipping Price</th>
                                                <th>Total Price</th>
                                                <th>Courier</th>
                                                <th>Service</th>
                                                <th>Payment Status</th>
                                                <th>Resi</th>
                                                <th>Shipping Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'id', name: 'id', orderable: false},
                { data: 'code', name: 'code'},
                { data: 'code_details', name: 'code_details'},
                { data: 'product', name: 'product'},
                { data: 'size', name: 'size'},
                { data: 'qty', name: 'qty'},
                { data: 'product_price', name: 'product_price', render: $.fn.dataTable.render.number(',', '.', 0, '')},
                { data: 'total_product_price', name: 'total_product_price', render: $.fn.dataTable.render.number(',', '.', 0, '')},
                { data: 'shipping_price', name: 'shipping_price', render: $.fn.dataTable.render.number(',', '.', 0, '')},
                { data: 'total_price', name: 'total_price', render: $.fn.dataTable.render.number(',', '.', 0, '')},
                { data: 'courier', name: 'courier'},
                { data: 'service', name: 'service'},
                { data: 'transaction_status', name: 'transaction_status'},
                { data: 'resi', name: 'resi'},
                { data: 'shipping_status', name: 'shipping_status'},
                { data: 'action', name: 'action'},
            ]
        });

        datatable.on( 'draw.dt', function () {
            var PageInfo = $('#crudTable').DataTable().page.info();

            datatable.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        });
    </script>
@endpush