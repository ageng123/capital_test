@extends('layouts.capital_life')
@section('content')
<div class="container-fluid px-4 py-3">
    <h1>Register New Account</h1>
    @include('components.form-register')

</div>
@endsection
@section('scripts')
<script>
    jQuery('.number-only').on('keyup', function(e){
        let input = e.target.value;
        let output = input.replace(/[^0-9]/g, "");
        e.target.value = output;
        let targetHidden = '.'+e.target.name+'_val';
        castInputValue(targetHidden, output);
    });
    jQuery('input').not('.number-only').on('keyup', function(e){
        let targetHidden = '.'+e.target.name+'_val';
        let output = e.target.value;
        castInputValue(targetHidden, output);
    });
    const castInputValue = (target, value) => {
        $(target).val(value);
    }
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
            url: '{{ route("register_user") }}',
            headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            beforeSend: function(){
                modernAlert.loading();
            },
            success: function(resp){
                modernAlert.success('Berhasil !', resp.message);
                setTimeout(function(){
                    window.open(resp.returnurl, '_self');
                }, 2000);

            },
            error:function(jqXHR, textStatus, errorThrown){
                Swal.close();
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