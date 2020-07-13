@extends("admin.layout.panel")
@section("content")

<style type="text/css">
  td,th{
    text-align: center;
  }
</style>

@if(Session::has('message'))
  <div class="col-lg-3">
    <div class="bs-component">
      <div class="alert alert-dismissible {{ Session::get('alert-class', 'alert-info') }}">
        <button class="close" type="button" data-dismiss="alert">×</button><strong>{{ Session::get('message') }}</strong>
      </div>
    </div>
  </div>
@endif
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Striped Table</h3>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>EMail</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if(!empty($data) && $data->count())
                @foreach($data as $key => $value)
                  <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>{{ $value->gender }}</td>
                    <td>
                      <button class="btn btn-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click To Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                      <button class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click To Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button> 
                    </td>
                    
                  </tr>
                @endforeach
              @else
                <td colspan="5">There are no data.</td>
              @endif
            </tbody>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>EMail</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
          <div class="pull-right">{!! $data->links() !!}</div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection