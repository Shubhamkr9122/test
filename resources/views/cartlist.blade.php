@extends('master')
@section('content')


    <div class="custom-product">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h4>Results For Products</h4>
                @foreach ($cartlist_item as $item)
                    <div class="row searched-item cart-list-divider">
                        <div class="col-sm-3">
                            <a href="detail/{{ $item->id }}">
                                <img class="trending-image" src="{{ $item->gallery }}">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <div class="">
                                <h2>{{ $item->name }}</h2>
                                <h5>{{ $item->description }}</h5>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <a href="/removecartitem/{{$item->cart_id}}" class="btn btn-warning">Remove Item</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
