@extends('layouts.admin')

@section('title')
Add Product
@endsection

@section('content')
<div class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Add Product</h2>
                <p class="dashboard-subtitle">
                  Add New Product
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

                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-froup">
                                <label>Nama Product</label>
                                <input type="text" name="name" id="" class="form-control" required>
                              </div>
                            </div>
                            
                            <div class="col-md-12">
                              <div class="form-froup">
                                <label>Pemilik Product</label>
                                <select name="users_id" class="form-control">
                                  @foreach ($users as $u)
                                      <option value="{{ $u->id }}">{{ $u->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-froup">
                                <label>Kategori Product</label>
                                <select name="categories_id" class="form-control">
                                  @foreach ($categories as $c)
                                      <option value="{{ $c->id }}">{{ $c->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-froup">
                                <label>Harga Product</label>
                                <input type="number" name="price" id="" class="form-control" required>
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-froup">
                                <label>Deskripsi Product</label>
                                <textarea name="description" id="editor"></textarea>
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

@push('addon-script')
  <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace( 'editor' );
    </script>  
@endpush