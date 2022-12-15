@extends('layouts.capital_life')
@section('content')
<div class="row w-auto">
    <div class="col-sm-12 col-md-7 py-4 px-4">
        @include('components.welcome-section')
    </div>
    <div class="d-sm-none d-md-block col-md-5 py-4 px-4">
        @include('components.point-information')
    </div>
</div>
@endsection