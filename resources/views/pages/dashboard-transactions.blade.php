@extends('layouts.dashboard')

@section('title')
Toko Dashboard Transactions
@endsection

@section('content')
<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Transactions</h2>
                <p class="dashboard-subtitle">
                  Big result start from the small one
                </p>
              </div>
              <div class="dashboard-content">
                <ul class="nav nav-pills" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a
                      class="nav-link active"
                      id="sell-tab"
                      data-toggle="tab"
                      href="#sell"
                      role="tab"
                      aria-controls="sell"
                      aria-selected="true"
                      >Sell Product</a
                    >
                  </li>
                  <li class="nav-item" role="presentation">
                    <a
                      class="nav-link"
                      id="buy-tab"
                      data-toggle="tab"
                      href="#buy"
                      role="tab"
                      aria-controls="buy"
                      aria-selected="false"
                      >Buy Product</a
                    >
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div
                    class="tab-pane fade show active"
                    id="sell"
                    role="tabpanel"
                    aria-labelledby="sell-tab"
                  >
                    <div class="row mt-3">
                      <div class="col-12 mt-2">

                        @forelse ($sell_t as $s)
                        <a
                          class="card card-list d-block"
                          href="{{ route('dashboard-transaction-details',$s->id) }}"
                        >
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-1">
                                <img
                                  src="{{ Storage::url($s->product->galleries->first()->photos ?? '') }}"
                                  alt=""
                                  class="w-50"
                                />
                              </div>
                              <div class="col-md-4">
                                {{ $s->product->name }}
                              </div>
                              <div class="col-md-3">
                                {{ $s->product->user->store_name }}
                              </div>
                              <div class="col-md-3">
                                {{ $s->created_at }}
                              </div>
                              <div class="col-md-1 d-none d-md-block">
                                <img
                                  src="/images/dashboard-arrow-right.svg"
                                  alt=""
                                />
                              </div>
                            </div>
                          </div>
                        </a>
                        @empty
                            Masih Kosong
                        @endforelse
                        
                        
                      </div>
                    </div>
                  </div>
                  <div
                    class="tab-pane fade"
                    id="buy"
                    role="tabpanel"
                    aria-labelledby="buy-tab"
                  >
                    <div class="row mt-3">
                      <div class="col-12 mt-2">
                        @forelse ($buy_t as $b)
                        <a
                          class="card card-list d-block"
                          href="{{ route('dashboard-transaction-details',$b->id) }}"
                        >
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-1">
                                <img
                                  src="{{ Storage::url($b->product->galleries->first()->photos ?? '') }}"
                                  alt=""
                                  class="w-50"
                                />
                              </div>
                              <div class="col-md-4">
                                {{ $b->product->name }}
                              </div>
                              <div class="col-md-3">
                                {{ $b->product->user->store_name }}
                              </div>
                              <div class="col-md-3">
                                {{ $b->created_at }}
                              </div>
                              <div class="col-md-1 d-none d-md-block">
                                <img
                                  src="/images/dashboard-arrow-right.svg"
                                  alt=""
                                />
                              </div>
                            </div>
                          </div>
                        </a>
                        @empty
                            Masih Kosong
                        @endforelse
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection