@extends('layouts.app')

@section('title')
Cart
@endsection

@section('content')
    <div class="page-content page-cart">
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Cart
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
              <table
                class="table table-borderless table-cart"
                aria-describedby="Cart"
              >
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name &amp; Seller</th>
                    <th scope="col">Price</th>
                    <th scope="col">Menu</th>
                  </tr>
                </thead>
                <tbody>

                  @php
                    $total=0
                  @endphp
                  @forelse ($cart as $c)
                  <tr>
                    <td style="width: 25%;">
                      @if ($c->product->galleries)
                        <img
                          src="{{ Storage::url($c->product->galleries->first()->photos) }}"
                          alt=""
                          class="cart-image"
                        /> 
                      @endif
                      
                    </td>
                    <td style="width: 35%;">
                      <div class="product-title">{{ $c->product->name }}</div>
                      <div class="product-subtitle">by {{ $c->user->store_name }}</div>
                    </td>
                    <td style="width: 35%;">
                      <div class="product-title">Rp. {{ number_format($c->product->price) }}</div>
                      <div class="product-subtitle">IDR</div>
                    </td>
                    <td style="width: 20%;">
                      <form action="{{ route('cart-delete',$c->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-remove-cart">
                          Remove
                        </button>
                      </form>
                    </td>
                  </tr>
                      @php
                        $total += $c->product->price
                      @endphp
                  @empty

                  <tr>
                    
                    <td style="width: 80%;">
                      <div class="product-title">Keranjang Masih Kosong</div>
                    </td>
                    <td style="width: 20%;">
                      <a href="{{ route('home') }}" class="btn btn-success">
                        Kembali
                      </a>
                    </td>
                  </tr>
                      
                  @endforelse
                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Shipping Details</h2>
            </div>
          </div>

          <form action="#" method="post" id="locations" >
            @csrf
            <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="address_one">Address 1</label>
                  <input
                    type="text"
                    class="form-control"
                    id="address_one"
                    aria-describedby="emailHelp"
                    name="address_one"
                    value="Setra Duta Cemara"
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="address_two">Address 2</label>
                  <input
                    type="text"
                    class="form-control"
                    id="address_two"
                    aria-describedby="emailHelp"
                    name="address_two"
                    value="Blok B2 No. 34"
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="provinces_id">Province</label>
                  <select name="provinces_id" id="provinces_id" class="form-control">
                    <option value="13">Sumatera Barat</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="regencies_id">City</label>
                  <select name="regencies_id" id="regencies_id" class="form-control">
                    <option value="1376">Kota Payakumbuh</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="zip_code">Zip Code</label>
                  <input
                    type="text"
                    class="form-control"
                    id="zip_code"
                    name="zip_code"
                    value="40512"
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="country">Country</label>
                  <input
                    type="text"
                    class="form-control"
                    id="country"
                    name="country"
                    value="Indonesia"
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="phone_number">Mobile</label>
                  <input
                    type="text"
                    class="form-control"
                    id="phone_number"
                    name="phone_number"
                    value="+628 2020 11111"
                  />
                </div>
              </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
              <div class="col-12">
                <hr />
              </div>
              <div class="col-12">
                <h2>Payment Informations</h2>
              </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="200">
              <div class="col-4 col-md-2">
                <div class="product-title">Rp. 0</div>
                <div class="product-subtitle">Country Tax</div>
              </div>
              <div class="col-4 col-md-3">
                <div class="product-title">Rp. 0</div>
                <div class="product-subtitle">Product Insurance</div>
              </div>
              <div class="col-4 col-md-2">
                <div class="product-title">Rp. 0</div>
                <div class="product-subtitle">Ship to Jakarta</div>
              </div>
              <div class="col-4 col-md-2">
                <div class="product-title text-success">Rp. {{ number_format($total ?? 0) }}</div>
                <div class="product-subtitle">Total</div>
              </div>
              <div class="col-8 col-md-3">
                <a
                  href="/success.html"
                  class="btn btn-success mt-4 px-4 btn-block"
                >
                  Checkout Now
                </a>
              </div>
            </div>
          </form>

        </div>
      </section>
    </div>
@endsection

@push('addon-sript')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
          regencies_id: null
        },
        methods: {
          getProvincesData(){
            var self =  this;
            axios.get('{{ route('api-provinces') }}')
              .then(function(response){
                self.provinces = response.data;
              })
          },
          getRegenciesData(){
            //
          }
        },
      });
    </script>
@endpush