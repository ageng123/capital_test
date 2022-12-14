<form action="">
    <div class="d-flex row px-2 py-2 gap-2 border mt-2">
        <div class="form-group mt-2">
            <h3>1. Data Member</h3>
        </div>
        <div class="form-group col-md-12">
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group col-md-12">
            <label for="">Jenis Kelamin</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group col-md-12">
            <label for="">Nomor KTP</label>
            <input type="text" name="ktp" class="form-control number-only">
        </div>
        <div class="form-group col-md-12">
            <label for="">Nomor HP</label>
            <input type="text" name="no_hp" class="form-control number-only">
        </div>
        <div class="form-group col-md-12">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group col-md-12">
            <label for="">Kode Referal</label>
            <input type="text" name="referral_code" class="form-control">
        </div>
    </div>
    <div class="d-flex row px-2 py-2 gap-2 border mt-2">
        <div class="form-group mt-2">
            <h3>2. Data Login</h3>
        </div>
        <div class="form-group col-md-12">
            <label for="">Username</label>
            <input type="text" readonly="true" name="" class="form-control no_hp_val">
            <input type="hidden" name="username" class="no_hp_val">
        </div>
        <div class="form-group col-md-12">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group col-md-12">
            <label for="">Confirm Password</label>
            <input type="password" class="form-control" name="password">
        </div>
    </div>
    <div class="d-flex row px-2 py-2 gap-2 border mt-3">
        <div class="form-group">
            <button class="btn btn-primary w-100">
                Sign Up
            </button>
            <span>
                Already have an account ? 
                <a href="" class="btn btn-link">Login Here !</a>
            </span>
        </div>
    </div>
</form>