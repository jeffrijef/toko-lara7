@extends('layouts.dashboard')

@section('title')
Toko Dashboard Products
@endsection

@section('content')
<div class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">My Products</h2>
                <p class="dashboard-subtitle">
                  Manage it well and get money
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <a
                      href="{{ route('dashboard-product-create') }}"
                      class="btn btn-success"
                      >Add New Product</a
                    >
                  </div>
                </div>
                <div class="row mt-4">

                  @forelse ($products as $p)
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a
                      class="card card-dashboard-product d-block"
                      href="{{ route('dashboard-product-details',$p->id) }}"
                    >
                      <div class="card-body">
                        <img
                          src="{{ Storage::url($p->galleries->first()->photos ?? '') }}"
                          alt=""
                          class="w-75 mb-2"
                        />
                        <div class="product-title">{{ $p->name }}</div>
                        <div class="product-category">{{ $p->category->name }}</div>
                      </div>
                    </a>
                  </div>
                  @empty
                    <h1>Kosong</h1>
                  @endforelse

                </div>
              </div>
            </div>
          </div>

@endsection