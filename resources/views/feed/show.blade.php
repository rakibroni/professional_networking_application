@extends('layouts.app')

@section('content')
  <div class="container" style="margin-top: 100px">
    <div class="row">
      <div class="col-12 p-5 shadow-lg">
        <x-post :post="$post" />
      </div>
    </div>
  </div>
@endsection
