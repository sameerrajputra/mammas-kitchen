@extends('layouts.app')

@section('title', 'Contact')

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
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Messages</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered" style="width:100%" id="slider_table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Subject
                        </th>
                        <th>
                          Message
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
                        @foreach($messages as $key=>$message)
                        	<tr>
                        		<td>{{ $key+1 }}</td>
                        		<td>{{ $message->name }}</td>
                        		<td>{{ $message->email }}</td>
                            <td>{{ $message->subject }}</td>
                            <td>{{ $message->message }}</td>
                        		<td>{{ $message->created_at }}</td>
                        		<td>{{ $message->updated_at }}</td>
                            <td>
                              <a href="" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>
                              <form id="delete-form-{{ $message->id }}" action="" style="display:none;" method="POST">
                                @csrf
                                @method('DELETE')
                              </form>
                              <button type="btton" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')) {
                                  event.preventDefault();
                                  document.getElementById('delete-form-{{ $message->id }}').submit();
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

