@extends('layouts.app')

@section('title')
    Checkout Butterlife
@endsection

@section('content')
    <div class="page-content page-cart">
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        @if ($carts->count())
            <section class="store-cart">
                <form action="{{ route('checkout-proses') }}" id="locations" enctype="multipart/form-data" method="POST">
                @csrf
                    <div class="container-fluid">
                        @php
                            $productPrice = 0
                        @endphp
                        <div class="row" data-aos="fade-up" data-aos-delay="200">
                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h2>Shipping Details</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="adress_one">Adress 1</label>
                                                    <input
                                                        type="text"
                                                        class="form-control rounded-0"
                                                        id="address_one"
                                                        name="address_one"
                                                        value="{{ Auth::user()->address_one }}"
                                                        required
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="address_two">Adress 2</label>
                                                    <input
                                                        type="text"
                                                        class="form-control rounded-0"
                                                        id="address_two"
                                                        name="address_two"
                                                        value="{{ Auth::user()->address_two }}"
                                                        required
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label for="provinces_id">Provinces</label>
                                                <select class="form-control provinsi-asal" name="province_origin" required>
                                                    <option selected disabled></option>
                                                    @foreach ($provinces as $province => $value)
                                                        <option value="{{ $province  }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label for="regencies_id">City</label>
                                                <select class="form-control kota-asal" name="city_origin" required>
                                                    <option value=""></option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label for="zip_code">Postal Code</label>
                                                <input
                                                    type="text"
                                                    class="form-control rounded-0"
                                                    id="zip_code"
                                                    name="zip_code"
                                                    value="{{ Auth::user()->zip_code }}"
                                                    required
                                                />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="country">Country</label>
                                                <input
                                                    type="text"
                                                    class="form-control rounded-0"
                                                    id="country"
                                                    name="country"
                                                    value="{{ Auth::user()->country }}"
                                                    required
                                                />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="phone_number">Phone Number</label>
                                                <input
                                                    type="text"
                                                    class="form-control rounded-0"
                                                    id="phone_number"
                                                    name="phone_number"
                                                    value="{{ Auth::user()->phone_number }}"
                                                    required
                                                />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group d-none">
                                                    <label>PROVINSI TUJUAN</label>
                                                    <select class="form-control provinsi-tujuan" name="province_destination">
                                                        @foreach ($provinces2 as $province)
                                                            <option value="{{ $province->province_id  }}">{{ $province->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group d-none">
                                                    <label>KOTA / KABUPATEN TUJUAN</label>
                                                    <select class="form-control kota-tujuan" name="city_destination">
                                                        @foreach ($cities2 as $city)
                                                            <option value="{{ $city->city_id  }}">{{ $city->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h2>Product Details</h2>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-borderless table-cart">
                                            <thead>
                                                <tr>
                                                    <td>Name</td>
                                                    <td>Size</td>
                                                    <td class="text-center">Qty</td>
                                                    <td class="text-center">Product Price</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $productPrice = 0
                                                @endphp
                                                @foreach ($carts as $cart)
                                                    <tr>
                                                        <td style="width: 20%">
                                                            <div class="product-title">{{ $cart->product->name }}</div>
                                                            <div class="product-subtitle">{{ $cart->product->category->name }}</div>
                                                        </td>
                                                        <td style="width: 10%">
                                                            <div class="product-title">{{ $cart->size }}</div>
                                                        </td>
                                                        <td style="width: 20%" class="text-center">
                                                            <div class="product-title">{{ $cart->qty }}</div>
                                                        </td>
                                                        <td style="width: 20%" class="text-center">
                                                            <div class="product-title">{{ number_format($cart->product->price) }}</div>
                                                            <div class="product-subtitle">Rupiah</div>
                                                        </td>
                                                    </tr>
                                                    @php
                                                    $productPrice += $cart->product->price * $cart->qty
                                                    @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" data-aos="fade-up" data-aos-delay="150">
                            <div class="col-12">
                                <h2>Shipping Options</h2>
                            </div>
                            <div class="col-12 mb-2">
                                <hr>
                            </div>
                        </div>
                        <div class="row"  data-aos="fade-up" data-aos-delay="150">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <select class="form-control kurir" name="courier" required>
                                        <option selected disabled>-- Select Shipping Options --</option>
                                        <option value="jne">JNE</option>
                                        <option value="pos">POS</option>
                                        <option value="tiki">TIKI</option>
                                        <option value="COD">Cash On Delivery</option>
                                        <option value="GOJEK">Gojek</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12 d-none">
                                <div class="form-group">
                                    <label>Weight (GRAM)</label>
                                    <input type="number" class="form-control" name="weight" id="weight" value="1000" placeholder="Masukkan Berat (GRAM)">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row" id="ongkir">
                                </div>
                            </div>
                            <div class="col-12 col-md-12 mb-5">
                                <label>&nbsp;</label>
                                <input type="button" class="btn btn-primary btn-block btn-check rounded-0" value="Check Shipping Price">
                            </div>
                        </div>
                        <div class="row" data-aos="fade-up" data-aos-delay="150">
                            <div class="col-12">
                                <h2>Payment Information</h2>
                            </div>
                            <div class="col-12 mb-2">
                                <hr>
                            </div>
                        </div>
                        <div class="row" data-aos="fade-up" data-aos-delay="150">
                            <input type="hidden" name="product_price" id="product_price" value="{{ $productPrice }}">
                            {{-- <div class="col-4 col-md-2">
                                <div class="product-title">Rp. 0</div>
                                <div class="product-subtitle">Country Text</div>
                            </div> --}}
                            <div class="col-4 col-md-3">
                                <div class="product-title" name="product_price">Rp. {{ number_format($productPrice ?? 0) }}</div>
                                <div class="product-subtitle">Total Product Price</div>
                            </div> 
                            <div class="col-4 col-md-2">
                                <input type="hidden" name="shipping_price" id="shipping_price">
                                <div class="product-title" id="shipping">Rp. 0</div>
                                <div class="product-subtitle">Shipping Price</div>
                            </div> 
                            <div class="col-4 col-md-6 text-right">
                                <input type="hidden" name="total_price" id="total_price">
                                <div class="product-title text-success" id="total">Rp. {{ number_format($productPrice ?? 0) }}</div>
                                <div class="product-subtitle">Total Price</div>
                            </div>
                            <div class="col-12">
                                <div id="service"></div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-dark mt-4 px-4 btn-block rounded-0">
                                Checkout Now
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        @else
            <section class="store-cart">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center p-5 mt-5" data-aos="fade-up" data-aos-delay="100">
                            <h1>No Data Found.</h1>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            //ajax select kota asal
            $('select[name="province_origin"]').on('change', function () {
                let provindeId = $(this).val();
                if (provindeId) {
                    jQuery.ajax({
                        url: '/cities/'+provindeId,
                        // url: '{!!URL::to('cities')!!}',
                        // data: {'id':provindeId},
                        type: "GET",
                        dataType: "json",
                        success: function (response) {
                            $('select[name="city_origin"]').empty();
                            // $('select[name="city_origin"]').append('<option value="">-- pilih kota asal --</option>');
                            $.each(response, function (key, value) {
                                $('select[name="city_origin"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="city_origin"]').append('<option value="">-- pilih kota asal --</option>');
                }
            });

            //ajax select kota tujuan
            $('select[name="province_destination"]').on('change', function () {
                let provindeId = $(this).val();
                if (provindeId) {
                    jQuery.ajax({
                        url: '/cities/'+provindeId,
                        type: "GET",
                        dataType: "json",
                        success: function (response) {
                            $('select[name="city_destination"]').empty();
                            // $('select[name="city_destination"]').append('<option value="">-- pilih kota tujuan --</option>');
                            $.each(response, function (key, value) {
                                $('select[name="city_destination"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="city_destination"]').append('<option value="">-- pilih kota tujuan --</option>');
                }
            });

            //ajax check ongkir
            let isProcessing     = false;
            $('.kurir').change(function (e) {
                e.preventDefault();

                let token            = $("meta[name='csrf-token']").attr("content");
                let city_origin      = $('select[name=city_origin]').val();
                let city_destination = $('select[name=city_destination]').val();
                let courier          = $('select[name=courier]').val();
                let weight           = $('#weight').val();

                if(isProcessing){
                    return ;
                }

                if(courier == 'jne')
                {
                    $('.btn-check').show();
                    isProcessing = true;
                    jQuery.ajax({
                        url: '/ongkir',
                        data: {
                            _token:              token,
                            city_origin:         city_origin,
                            city_destination:    city_destination,
                            courier:             courier,
                            weight:              weight,
                        },
                        dataType: "JSON",
                        type: "POST",
                        success: function (response) {
                            isProcessing = false;
                            if (response) {
                                $('#ongkir').empty();
                                $('.ongkir').addClass('d-block');
                                var html = "";
                                $.each(response[0]['costs'], function (key, value) {
                                    html += `
                                            <div class="col-md-4">
                                                <div class="card shadow-sm">
                                                    <div class="card-body">
                                                        <input type="radio" name="cost" id="cost" value="${value.cost[0].value}" required>
                                                        <input type="radio" name="service" value="${value.service}" required>
                                                        <label for="cost">
                                                            ${value.service}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            `;
                                    html += '</div>'
                                    $('#ongkir').html(html);
                                });
                            }
                        }
                    });
                }
                else
                {
                    if(courier == 'pos')
                    {
                        $('.btn-check').show();
                        isProcessing = true;
                        jQuery.ajax({
                            url: '/ongkir',
                            data: {
                                _token:              token,
                                city_origin:         city_origin,
                                city_destination:    city_destination,
                                courier:             courier,
                                weight:              weight,
                            },
                            dataType: "JSON",
                            type: "POST",
                            success: function (response) {
                                isProcessing = false;
                                if (response) {
                                    $('#ongkir').empty();
                                    $('.ongkir').addClass('d-block');
                                    var html = "";
                                    $.each(response[0]['costs'], function (key, value) {
                                        html += `
                                                <div class="col-md-4">
                                                    <div class="card shadow-sm">
                                                        <div class="card-body">
                                                            <input type="radio" name="cost" id="cost" value="${value.cost[0].value}" required>
                                                            <input type="radio" name="service" value="${value.service}" required>
                                                            <label for="cost">
                                                                ${value.service}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                `;
                                        html += '</div>'
                                        $('#ongkir').html(html);
                                    });
                                }
                            }
                        });
                    }
                    else
                    {
                        if(courier == 'tiki')
                        {
                            $('.btn-check').show();
                            isProcessing = true;
                            jQuery.ajax({
                                url: '/ongkir',
                                data: {
                                    _token:              token,
                                    city_origin:         city_origin,
                                    city_destination:    city_destination,
                                    courier:             courier,
                                    weight:              weight,
                                },
                                dataType: "JSON",
                                type: "POST",
                                success: function (response) {
                                    isProcessing = false;
                                    if (response) {
                                        $('#ongkir').empty();
                                        $('.ongkir').addClass('d-block');
                                        var html = "";
                                        $.each(response[0]['costs'], function (key, value) {
                                            html += `
                                                    <div class="col-md-4">
                                                        <div class="card shadow-sm">
                                                            <div class="card-body">
                                                                <input type="radio" name="cost" id="cost" value="${value.cost[0].value}" required>
                                                                <input type="radio" name="service" value="${value.service}" required>
                                                                <label for="cost">
                                                                    ${value.service}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    `;
                                            html += '</div>'
                                            $('#ongkir').html(html);
                                        });
                                    }
                                }
                            });
                        }
                        else
                        {
                            if(courier == 'COD')
                            {
                                let shipping_price = 0
                                let product_price = $('#product_price').val();

                                document.getElementById("shipping").innerHTML = shipping_price;
                                document.getElementById("shipping_price").value = shipping_price;
                                document.getElementById("total_price").value = product_price;
                                document.getElementById("total").innerHTML = product_price;
                                $('.btn-check').hide();
                                $('#ongkir').empty();

                                var html = "";
                                html += `
                                        <div class="col-12 text-center mt-2">
                                            After successful payment, please go directly to the store with the transaction code
                                        </div>`
                                $('#ongkir').html(html);
                            }
                            else
                            {
                                if(courier == 'GOJEK')
                                {
                                    let shipping_price = 0
                                    let product_price = $('#product_price').val();

                                    document.getElementById("shipping").innerHTML = shipping_price;
                                    document.getElementById("shipping_price").value = shipping_price;
                                    document.getElementById("total_price").value = product_price;
                                    document.getElementById("total").innerHTML = product_price;
                                    $('.btn-check').hide();
                                    $('#ongkir').empty();

                                    var html = "";
                                    html += `
                                            <div class="col-12 text-center mt-2">
                                                After successful payment, we will send a message to you via WhatsApp to inform you about the Gojek courier.<br>
                                                <strong>Note: Gojek courier costs are the responsibility of the buyer</strong>
                                            </div>`
                                    $('#ongkir').html(html);
                                }
                            }
                        }
                    }
                }
            });

            $("input[type='button']").click(function(){
                var product_price = $("input[name='product_price']").val();
                var shipping_price = $("input[name='cost']:checked").val();
                var total_price = parseInt(product_price) + parseInt(shipping_price);

                if(total_price){
                    document.getElementById("shipping").innerHTML = shipping_price;
                    document.getElementById("shipping_price").value = shipping_price;
                    document.getElementById("total").innerHTML = total_price;
                    document.getElementById("total_price").value = total_price;
                }
            });

        });
    </script>
    <script>
      var locations = new Vue({
        el: "#locations",
        mounted() {
          AOS.init();
          this.getProvincesData();
        },
        data: {
          provinces: null,
          regencies: null,
          provinces_id: null,
          regencies_id: null,
        },
        methods: {
          getProvincesData(){
            var self = this;
            axios.get('{{ route('api-provinces') }}')
                  .then(function(response){
                    self.provinces = response.data;
                  })
          },
          getRegenciesData(){
            var self = this;
            axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                  .then(function(response){
                    self.regencies = response.data;
                  })
          },
        },
        watch: {
          provinces_id: function(val, oldVal) {
            this.regencies_id = null;
            this.getRegenciesData();
          }
        },
      });
    </script>
@endpush