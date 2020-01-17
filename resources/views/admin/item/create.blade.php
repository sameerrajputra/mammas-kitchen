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
                  <form method="post" action="{{ route('item.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Select Category</label>
                          <select class="form-control" id="category_id" name="category_id" required="required">
                            <option value="0">Please select a category</option>
                            @foreach($categories as $key=>$category)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Item name</label>
                          <input type="text" class="form-control" name="name">
                        </div>
                      </div>
                    </div>
                    
                     
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Description</label>
                          <input type="text" class="form-control" name="description">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Price</label>
                          <input type="text" class="form-control" name="price">
                        </div>
                      </div>
                    </div>
                      <div class="row">
                      <div class="col-md-12">
                        <div class="form-group form-file-upload form-file-simple">
                          <label class="control-label">Image</label>
                           <input type="file" name="image">
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
@endpush

