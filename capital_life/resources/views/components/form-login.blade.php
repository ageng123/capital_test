<form action="" class="border p-2">
    <div class="d-flex row px-2 py-2 gap-2">
        <div class="form-group text-center w-100">
            <h2>Form Login</h2>
        </div>
        <div class="form-group col-md-12">
            <label for="">Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group col-md-12">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group mt-4">
            
            <button class="btn btn-primary w-100">
                Sign In
            </button>
            <span class="text-small">
                Don't have an account ?<a href="{{ route('landing.register') }}" class="btn btn-link text-small">Register Here !</a>
            </span>
        </div>
    </div>
</form>