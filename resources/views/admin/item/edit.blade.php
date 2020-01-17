@extends('layouts.app')

@section('title', 'Item')

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
                  <h4 class="card-title ">Add New Item</h4>
                  <p class="card-category">Create a new Item</p>
                </div>
                <div class="card-body">
                  <form method="post" action="{{ route('item.update', $item->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Select Category</label>
                          <select class="form-control" id="category_id" name="category_id" required="required">
                            <option value="0">Please select a category</option>
                            @foreach($categories as $key=>$category)
                              <option value="{{$category->id}}" {{ ($item->category_id == $category->id ) ? 'selected' : ''  }}>{{$category->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Item name</label>
                          <input type="text" class="form-control" value="{{ $item->name }}" name="name">
                        </div>
                      </div>
                    </div>
                    
                     
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Description</label>
                          <input type="text" class="form-control" value="{{ $item->description }}" name="description">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Price</label>
                          <input type="text" class="form-control" value="{{ $item->price }}" name="price">
                        </div>
                      </div>
                    </div>
                      <div class="row">
                      <div class="col-md-12">
                        <div class="form-group form-file-upload form-file-simple">
                          <label class="control-label">Image</label>
                            @if ($item->image)
                            <div id="row_image">
                                      <img src="{{ asset('uploads/item/'.$item->image) }}" width="200" height="100">
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
                      <a href="{{ route('item.index')}}" class="btn btn-danger">Back</a>
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

