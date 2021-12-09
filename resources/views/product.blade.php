@extends('backend_master')

@section('content')

	<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="icofont-grocery"></i> Products</h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Products</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
         	
          <div class="tile">
            <div class="tile-body">
              <h2 class="d-inline-block">Product List</h2>
              <a href="{{route('piechart')}}" class="btn btn-primary float-right">Export Pie chart</a>
              <a href="{{route('linechart')}}" class="btn btn-primary float-right">Export Line chart</a>
              <a href="{{ route('download') }}" class="btn btn-sm btn-primary"><i class="fa fa-download"></i>Download Backup</a>
              <div class="table-responsive mt-3">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">Price</th>
                      <th scope="col">Sale</th>
                      <th scope="col">Quantity</th> 
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $i=1;
                    @endphp
                    @foreach($products as $row)
                    
                    <tr>
                      <th scope="row">{{$i++}}</th>
                      <td>{{$row->name}}</td>
                      <td>{{$row->price}}</td>
                      <td>{{$row->sales}}</td>
                      <td>{{$row->quantity}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>

    </main>

@endsection

@section('script')
  <script type="text/javascript" src="{{asset('backend_assets/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend_assets/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endsection