@extends('layouts.app')

@section('title', 'Reservation')

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
                  <h4 class="card-title ">All Reservations</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered" style="width:100%" id="slider_table">
                      <thead class=" text-primary">
                        <th>
                          S.N
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Phone
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Date And Time
                        </th>
                        <th>
                          Message
                        </th>
                        <th>
                          Status
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
                        @foreach($reservations as $key=>$reservation)
                        	<tr>
                        		<td>{{ $key+1 }}</td>
                        		<td>{{ $reservation->name }}</td>
                        		<td>{{ $reservation->phone }}</td>
                            <td>{{ $reservation->email }}</td>
                            <td>{{ $reservation->date_and_time }}</td>
                            <td>{{ $reservation->message }}</td>
                            <td>
                              @if($reservation->status == true)
                                <span class="label label-info">Confirmed</span>
                              @else
                                <span class="label label-danger">Not Confirmed Yet</span>
                              @endif
                            </td>
                        		<td>{{ $reservation->created_at }}</td>
                        		<td>{{ $reservation->updated_at }}</td>
                            <td>
                              @if($reservation->status == false)
                              <form id="update-form-{{ $reservation->id }}" action="{{ route('reservation.update', $reservation->id) }}" style="display:none;" method="POST">
                                @csrf
                                @method('PUT')
                              </form>
                              <button type="btton" class="btn btn-success btn-sm" onclick="if(confirm('Are you sure? You want to change this status?')) {
                                  event.preventDefault();
                                  document.getElementById('update-form-{{ $reservation->id }}').submit();
                              } else {
                                event.preventDefault();
                              }"><i class="material-icons">done</i></button>
                              @endif
                              <form id="delete-form-{{ $reservation->id }}" action="{{ route('reservation.destroy', $reservation->id) }}" style="display:none;" method="POST">
                                @csrf
                                @method('DELETE')
                              </form>
                              <button type="btton" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')) {
                                  event.preventDefault();
                                  document.getElementById('delete-form-{{ $reservation->id }}').submit();
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

