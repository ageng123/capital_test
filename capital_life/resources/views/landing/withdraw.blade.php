@extends('layouts.capital_life')
@section('content')
<div class="row w-100 mt-4">
    <div class="col-md-8 shadow">
        <div class="row">
            <div class="col-md-10 offset-md-1 py-3 mt-4">
                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-tabs me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                      <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Withdrawal</button>
                      <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">History</button>
                      <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Point Gained</button>
                    </div>
                    <div class="tab-content w-100" id="v-pills-tabContent">
                      <div class="tab-pane w-100 fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">@include('components.withdraw-form')</div>
                      <div class="tab-pane w-100 fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">@include('components.withdraw-history')</div>
                      <div class="tab-pane w-100 fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">@include('components.point-gained')</div>
                    </div>
                  </div>
                  
            </div>
           
        </div>
    </div>

    <div class="col-md-4 shadow">
        @include('components.point-detail')
    </div>
    
        
    </div>
    
</div>
@endsection
@section('scripts')
<script>
    function fillAmount(el, event){
        let value = el.val(), rate = $('#conversion_rate').val(), targetEl = $('#conversion'), limit = el.attr('data-limit');
        value = value.replace(/\./g, "");
        let intVal = parseInt(value), intLimit = parseInt(limit), rateNumber = parseFloat(rate);
        if(intVal > intLimit) {
            el.val(intLimit);
            intVal = intLimit;
        }
        let conversion_val = intVal * rateNumber;
        targetEl.val(conversion_val);

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
            url: '{{ route("logged_in.withdraw") }}',
            headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            success: function(resp){
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