@extends('layouts.app')

@section('title', 'Slider')

@push('css')
<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              @include('layouts.partial.msg')
                <a href="{{ route('slider.create')}} " class="btn btn-info">Create</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Sliders</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered" style="width:100%" id="slider_table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Title
                        </th>
                        <th>
                          Sub Title
                        </th>
                        <th>
                          Image
                        </th>
                        <th>
                          Created At
                        </th>
                        <th>
                          Updated At
                        </th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        @foreach($sliders as $key=>$slider)
                        	<tr>
                        		<td>{{ $key+1 }}</td>
                        		<td>{{ $slider->title }}</td>
                        		<td>{{ $slider->sub_title }}</td>
                        		<td>{{ $slider->image}}</td>
                        		<td>{{ $slider->created_at }}</td>
                        		<td>{{ $slider->updated_at }}</td>
                            <td>
                              <a href="{{ route('slider.edit', $slider->id)}}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>
                              <form id="delete-form-{{ $slider->id }}" action="{{ route('slider.destroy', $slider->id) }}" style="display:none;" method="POST">
                                @csrf
                                @method('DELETE')
                              </form>
                              <button type="btton" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')) {
                                  event.preventDefault();
                                  document.getElementById('delete-form-{{ $slider->id }}').submit();
                              } else {
                                event.preventDefault();
                              }"><i class="material-icons">delete</i></button>
                            </td>
                        	</tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('scripts')
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
    $('#slider_table').DataTable();
} );
  </script>
@endpush

