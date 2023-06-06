@extends('layouts.app') @section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 mt-4">
            <div class="card p-3">
                <p>
                    NAME : <b>{{$product->name}}</b>
                </p>
                <p>
                    DESCRIPTION : <b>{{$product->description}}</b>
                </p>
                <img
                    src="/products/{{$product->image}}"
                    class="rounded"
                    width="100%"
                    height="60%"
                    alt="img"
                />
            </div>
        </div>
    </div>
</div>
@endsection
