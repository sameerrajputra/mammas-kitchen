@extends('layouts.app')

@section('title', 'Slider')

@push('css')
@endpush

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
               @include('layouts.partial.msg')
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Add New Sliders</h4>
                  <p class="card-category">Create a new slider</p>
                </div>
                <div class="card-body">
                  <form method="post" action="{{ route('slider.update', $slider->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
                        </div>
                      </div>
                    </div>
                      <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sub-title</label>
                          <input type="text" class="form-control" name="sub_title" value="{{ $slider->sub_title }}">
                        </div>
                      </div>
                    </div>
                      <div class="row">
                      <div class="col-md-12">
                        <div class="form-group form-file-upload form-file-simple">
                          <label class="control-label">Image</label>
                          @if ($slider->image)
                            <div id="row_image">
                                      <img src="{{ asset('uploads/slider/'.$slider->image) }}" width="200" height="100">
                                      <a href="#" class="label bg-red" onclick="remove_image()" style="padding: 16px 2px 1px;"><i class="material-icons">clear</i></a>
                                    </div>
                                     <div id="input_row_image">
                                      <input type="file" name="image">
                                    </div>
                          @else
                          <input type="file" name="image">
                          @endif
                           
                        </div>
                      </div>
                      </div>
                      <a href="{{ route('slider.index')}}" class="btn btn-danger">Back</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('scripts')
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
  $( document ).ready(function() {
    $('#input_row_image').hide();
});
 function remove_image() {
    $('#row_image').hide();
    $('#input_row_image').show();
 }

</script>

@endpush

