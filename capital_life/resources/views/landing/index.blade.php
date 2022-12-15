@extends('layouts.capital_life')
@section('content')
<div class="row w-auto">
    <div class="col-sm-12 col-md-9 py-4 px-4">
        @include('components.news-section')
        <section class="d-none">
            @include('components.top-products')
        </section>
        <section>
            @include('components.top-articles')
        </section>
    </div>
    <div class="d-sm-none d-md-block col-md-3 py-4 px-4">
        @if(Auth::check())
        @include('components.point-information')
        @else
        @include('components.form-login')
        @endif
    </div>
</div>
@endsection
@section('scripts')
<script>
    const formSubmit = (form, event) => {
        form = $(form).serializeArray();
        let postData = {}; 
        form.map((i) => {
            let {name, value} = i;
            postData[name] = value;
            if(value != ''){
                $('#'+name).removeClass('is-invalid');
                $('#'+name).addClass('is-valid');
            }
        });

        $.ajax({
            method: 'POST',
            data: JSON.stringify(postData),
            contentType: 'application/json',
            processData: false,
            url: '{{ route("authenticate.user") }}',
            headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            beforeSend: function(){
                modernAlert.loading();
            },
            success: function(resp){
                modernAlert.success('Success !', resp.message);
                window.open(resp.returnurl, '_self');

            },
            error:function(jqXHR, textStatus, errorThrown){
                var { responseJSON } = jqXHR;
                var { errors } = responseJSON;
                console.log(errors);
                for(var i in errors){
                    $('.feedback-'+i).html(errors[i]);
                    $('#'+i).removeClass('is-valid');

                    $('#'+i).addClass('is-invalid');
                }
            }
        })

    }
   
</script>
@endsection