<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <div class="container">
    <div class="row">
      <a href="{{action('ExcelCsvController@exportExcel')}}">Export Excel</a> | 
      <a href="{{action('ExcelCsvController@exportCsv')}}">Export Csv</a>
    </div>
    <table class="table table-striped">
    <thead>
      <th>Name</th>
      <th>Sku</th>
      <th>Description</th>
      <th>Price</th>
      <th>Quantity</th>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->sku}}</td>
        <td>{{$product->description}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->quantity}}</td>
        
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  
</body>
</html>
