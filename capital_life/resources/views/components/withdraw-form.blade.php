<form action="" id="withdraw-form" class="">
    <h1>Withdrawal</h1>
    <div class="row">
        <div class="form-group col-md-12 mt-2">
            <label for="">Point Amount</label>
            <input type="text" onkeyup="fillAmount($(this), event)" data-limit="{{ $user->user_point->point ?? 0 }}" name="point_amount" class="form-control">
        </div>
        <div class="form-group col-md-6 mt-2">
            <label for="">Point Conversion</label>
            <input type="text" id="conversion" readonly class="form-control">
        </div>
        <div class="form-group col-md-6 mt-2">
            <label for="">Point Conversion Rate</label>
            <input type="text" id="conversion_rate" readonly class="form-control" value="{{ $point_conversion_rate_value ?? 0}}">
        </div>
        <div class="form-group col-md-2 mt-2">
            <label for="">Kode Bank</label>
            <input type="text" name="kode_bank" class="form-control" id="">
        </div>
        <div class="form-group col-md-10 mt-2">
            <label for="">No. Rekening Bank</label>
            <input type="text" name="no_rekening" class="form-control">
        </div>
        <div class="form-group col-md-12 mt-3" id="can_withdraw"><button type="button" onclick="formSubmit('#withdraw-form', event)" class="btn btn-primary btn-block w-100" >Withdraw</button></div>
    </div>
</form>