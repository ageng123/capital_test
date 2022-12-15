@extends('layouts.capital_life')
@section('content')
<div class="row w-auto">
    <div class="col-sm-12 col-md-8 py-4 px-4">
        @include('components.article-detail-components')
    </div>
    <div class="d-sm-none d-md-block col-md-4 py-4 px-4">
        @if(!empty($user))
        @include('components.point-information')

        @else
        @include('components.form-login')

        @endif
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
                storePoint($('#timer').attr('data-article-id'));
            }
            $('#timer').html(timer);
            return;
        }
        
    }, 1000);
    function storePoint(articlesId){
        $.ajax({
            method: 'POST',
            contentType: 'application/json',
            dataType: 'json',
            data: {articles_id: articlesId},
            headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            url: `/logged_in/storePoint/`+articlesId,
            success: function(resp){
                console.log(resp);
                modernAlert.success('Selamat !',resp.message);
                setTimeout(function(){
                    window.open(resp.returnurl, '_self');
                },3000);
            },
            error: function(jqXHR, textStatus, errorThrown){

            }
        })
    }
</script>

@endsection