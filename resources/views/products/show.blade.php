
@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2> Show Product                    
            <div class="float-end">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
                </h2>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Image:</strong>
                @if ($product->image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->place }}" style="max-width: 100px; max-height: 100px;">
                    </div>
                @else
                    <div class="mb-3">
                        <p>No image available</p>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Place:</strong>
                {{ $product->place }}
            </div>
        </div>
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Province:</strong>
                {{ $product->province }}
            </div>
        </div>
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $product->description }}
            </div>
        </div>
    </div>
@endsection