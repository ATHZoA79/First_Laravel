@extends('template.template')

@section('stylesheet')
<link rel="stylesheet" href=" {{ asset('css/template.css') }} ">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('table')
<table id="table_1" class="display">
  <thead>
    <tr>
      <th>Column 1</th>
      <th>Column 2</th>
      <th>Column 3</th>
      <th>Column 4</th>
      <th>Column 5</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Row 1 Data 1</td>
      <td>Row 1 Data 2</td>
      <td>Row 1 Data 2</td>
      <td>Row 1 Data 2</td>
      <td>Row 1 Data 2</td>
    </tr>
    <tr>
      <td>Row 2 Data 1</td>
      <td>Row 2 Data 2</td>
      <td>Row 2 Data 2</td>
      <td>Row 2 Data 2</td>
      <td>Row 2 Data 2</td>
    </tr>
  </tbody>
</table>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
  integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {
    $('#table_1').DataTable();
} );
</script>
@endsection