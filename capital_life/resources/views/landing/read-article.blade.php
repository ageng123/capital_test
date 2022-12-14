@extends('layouts.capital_life')
@section('content')
<div class="row w-auto">
    <div class="col-sm-12 col-md-8 py-4 px-4">
        @include('components.article-detail-components')
    </div>
    <div class="d-sm-none d-md-block col-md-4 py-4 px-4">
        @include('components.point-information')
    </div>
</div>
@endsection
@section('scripts')
<script>
    setInterval(function(){
        let timer = $('#timer').html();
        timer = parseInt(timer);
        if(timer > 0){
            timer = timer - 1;
            if(timer == 0){
                $('#timer').parent().removeClass('text-success');
                $('#timer').parent().addClass('text-danger'); 
            }
            $('#timer').html(timer);
            return;
        }
        
    }, 1000);
    $('#point-information').ready(function(){
        $.get('{{route('get.point_info')}}').then(resp => {
            var { data } = resp;
            $('#point_value').html(data.point);
            $('#point_conversion_value').html(data.conversion);
            $('#point_expired_value').html(data.expired);
            if(!data.canWithdraw){
                $("#can_withdraw").addClass('d-none')   
            }
        })
    })
</script>

@endsection