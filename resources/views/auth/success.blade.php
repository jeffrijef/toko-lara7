@extends('layouts.auth')

@section('content')

@endsection
<div class="page-content page-success">
      <div class="section-success" data-aos="zoom-in">
        <div class="container">
          <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="/images/success.svg" alt="" class="mb-4" />
              <h2>
                Transaction Processed!
              </h2>
              <p>
                Silahkan tunggu konfirmasi email dari kami dan <br />
                kami akan menginformasikan resi secept mungkin!
              </p>
              <div>
                <a class="btn btn-success w-50 mt-4" href="/dashboard.html">
                  My Dashboard
                </a>
                <a class="btn btn-signup w-50 mt-2" href="/index.html">
                  Go To Shopping
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script>
      Vue.use(Toasted);

      var register = new Vue({
        el: "#register",
        mounted() {
          AOS.init();
          this.$toasted.error(
            "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
            {
              position: "top-center",
              className: "rounded",
              duration: 1000,
            }
          );
        },
        data: {
          name: "Angga Hazza Sett",
          email: "kamujagoan@bwa.id",
          password: "",
          is_store_open: true,
          store_name: "",
        },
      });
    </script>
@endpush
