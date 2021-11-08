@extends('layouts.admin')

@section('title')
Edit User
@endsection

@section('content')
<div class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Edit User</h2>
                <p class="dashboard-subtitle">
                  Edit User
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

                        <form action="{{ route('user.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                          @method('PUT')
                          @csrf
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-froup">
                                <label>Nama User</label>
                                <input type="text" value="{{ $item->name }}" name="name" id="" class="form-control" required>
                              </div>
                            </div>
                            
                            <div class="col-md-12">
                              <div class="form-froup">
                                <label>Email</label>
                                <input type="email" value="{{ $item->email }}" name="email" id="" class="form-control" required>
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-froup">
                                <label>Password</label>
                                <input type="password" name="password" id="" class="form-control">
                                <small>Kosongkan jika tidak ganti password</small>
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-froup">
                                <label>Roles</label>
                                <select name="roles" required class="form-control">
                                  <option value="{{ $item->roles }}">Tidak diganti</option>
                                  <option value="admin">admin</option>
                                  <option value="user">user</option>
                                </select>
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