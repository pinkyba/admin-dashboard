<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Category List</title>
  <style type="text/css">
    @font-face { 
      font-family: Unicode;
      src: url('{{public_path('Pyidaungsu-2.5_Regular.tff')}}');
    }

    *{
    font-family: Dejavu !important;
    }
 
    #table1{
      border-collapse: collapse;
      width: 100%;
    }
    #table1 td, #table1 th{
      border:  1px solid #111;
      padding: 8px;
    }
    #table1 tr:nth-child(even){
      background-color: lightblue;
    }
    #table1 th{
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: darkblue;
      color: white;
    }
  </style>
  
</head>
<body>
  <table class="table table-bordered mb-5" id="table1">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Myanmar</th>
      </tr>      
    </thead>
    <tbody>
      @php
        $i=1;
      @endphp
      @foreach($categories as $row)
      
        <tr>
          <td scope="row">{{$i++}}</td>
          <td>{{$row->name}}</td>
        </tr>
      @endforeach
      
    </tbody>
  </table>

  
</body>
</html>