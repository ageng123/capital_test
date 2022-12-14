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
</script>
@endsection