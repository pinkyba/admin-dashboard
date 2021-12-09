@extends('backend_master')

@section('content')

	<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Categories</h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Categories</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <h2 class="d-inline-block">Category Information</h2>
              <a href="{{route('categories.index')}}" class="btn btn-outline-primary float-right">
                  <i class="icofont-double-left"></i>
              </a>
              <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="exampleInputName">Category Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Category Name" name="name">
                      @error('name')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="exampleInputPhoto">Category Photo</label>
                      <input type="file" class="form-control @error('photo') is-invalid @enderror" id="exampleInputphoto" name="photo">
                    </div>
                    @error('photo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="status">
                        <label class="form-check-label" for="flexCheckDefault">
                          Status(Is Publish?)
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="exampleInputPhoto">Category Icon</label>
                      <input type="file" class="form-control @error('icon') is-invalid @enderror" id="exampleInputphoto" name="icon">
                    </div>
                    @error('icon')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button>
              </form>
            </div>
          </div>
        </div>

      </div>

    </main>
@endsection