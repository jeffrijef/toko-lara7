@extends('layouts.admin')

@section('title')
Add Product Gallery
@endsection

@section('content')
<div class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Add Product Gallery</h2>
                <p class="dashboard-subtitle">
                  Add New Product Gallery
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-md-12">
                    @if ($errors->any())
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

                        <form action="{{ route('product-gallery.store') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="row">
                            
                            <div class="col-md-12">
                              <div class="form-froup">
                                <label>Product</label>
                                <select name="products_id" class="form-control">
                                  @foreach ($products as $u)
                                      <option value="{{ $u->id }}">{{ $u->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-froup">
                                <label>Foto Product</label>
                                <input type="file" name="photos" id="" class="form-control" required>
                              </div>
                            </div>

                          </div>
                          <br>
                          <div class="row">
                            <div class="col text-right">
                              <button type="submit" class="btn btn-success px-5">
                                Save
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