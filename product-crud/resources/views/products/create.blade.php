@extends('layouts.app')
@section('main')
@if($message = Session::get('success'))
<div class="alert alert-success alert-block"><strong>{{$message}}</strong></div>
@endif
<div class="container justify-content-center">
    <div class="row justify-content-center">
        <div class="card p-3 col-sm-8 mt-3">
            <form method="post" action="/products/store" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">NAME</label>
                    <input type="text" class="form-control" id="name" name='name' value="{{old('name')}}">
                    @if($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">DESCRIPTION</label>
                    <textarea class="form-control" name="description" id="description" rows="4">{{old('description')}}</textarea>
                    @if($errors->has('description'))
                    <span class="text-danger">{{$errors->first('description')}}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">IMAGE</label>
                    <input class="form-control" type="file" id="image" name='image' value="{{old('image')}}">
                    @if($errors->has('image'))
                    <span class="text-danger">{{$errors->first('image')}}</span>
                    @endif
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

</body>

</html>
@endsection