@extends('backend_master')

@section('content')

	<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Categories</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <h2 class="d-inline-block">Category Edit Form</h2>
              <a href="{{route('categories.index')}}" class="btn btn-outline-primary float-right">
                  <i class="icofont-double-left"></i>
              </a>

              {{-- carry id of passed data from edit controller to update function of controller --}}
              <form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
                @csrf

                {{-- for update,put use @method('PUT') --}}
                @method('PUT')

                <div class="row">
                  <div class="col">
                    <div class="form-group row">
                      
                      <div class="col-md-8">
                        <ul class="nav nav-tabs">
                          <li class="nav-item">
                            <a class="nav-link active" id="nav-unit-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Category Photo </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="nav-discount-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Photo</a>
                          </li>
                          
                        </ul><br>
                        
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-unit-tab">                           
                                <img src="{{$category->photo}}" width="100">

                                {{-- carry old photo data with hidden input --}}
                                <input type="hidden" name="oldphoto" value="{{$category->photo}}">
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-discount-tab">
                                
                                <input type="file" class="form-control" id="exampleInputphoto" name="photo">
                            </div>
                        </div>
                        
                      </div>
                    </div>
                  </div> 
                  <div class="col">
                    <div class="form-group row">
                      
                      <div class="col-md-8">
                        <ul class="nav nav-tabs">
                          <li class="nav-item">
                            <a class="nav-link active" id="nav-unit-tab" data-toggle="tab" href="#nav-home1" role="tab" aria-controls="nav-home" aria-selected="true">Old Icon Photo </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="nav-discount-tab" data-toggle="tab" href="#nav-profile1" role="tab" aria-controls="nav-profile" aria-selected="false">New Photo</a>
                          </li>
                          
                        </ul><br>
                        
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home1" role="tabpanel" aria-labelledby="nav-unit-tab">                           
                                <img src="{{$category->icon}}" width="100">

                                {{-- carry old photo data with hidden input --}}
                                <input type="hidden" name="icon_oldphoto" value="{{$category->icon}}">
                            </div>
                            <div class="tab-pane fade" id="nav-profile1" role="tabpanel" aria-labelledby="nav-discount-tab">
                                
                                <input type="file" class="form-control" id="exampleInputphoto" name="icon">
                            </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>                
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group row">
                      
                      <div class="col-md-8">
                        <label> Catgory Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Category Name" name="name" value="{{$category->name}}">
                        @error('name')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div> 
                  <div class="col">
                    <label> Catgory Status</label>
                    <div class="form-check mt-1">
                      @if($category->status == "1")
                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="status" checked="">
                      @else
                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="status">
                      @endif
                        <label class="form-check-label" for="flexCheckDefault">
                          Status(Is Publish?)
                        </label>
                      </div>
                  </div>                
                </div>
                
                <button type="submit" class="btn btn-primary mt-1">Update</button>
              </form>
            </div>
          </div>
        </div>

      </div>

    </main>

@endsection