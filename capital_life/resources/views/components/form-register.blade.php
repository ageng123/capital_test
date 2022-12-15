<form action="" id="register-form">
    <div class="d-flex row px-2 py-2 gap-2 border mt-2">
        <div class="form-group mt-2">
            <h3>1. Data Member</h3>
        </div>
        <div class="form-group col-md-12">
            <label for="">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control">
            <span class="invalid-feedback feedback-nama"></span>
        </div>
        <div class="form-group col-md-12">
            <label for="">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                <option value="1">Laki-laki</option>
                <option value="2">Perempuan</option>
            </select>
            <span class="invalid-feedback feedback-jenis_kelamin"></span>

        </div>
        <div class="form-group col-md-12">
            <label for="">Nomor KTP</label>
            <input type="text" name="no_ktp" id="no_ktp" class="form-control number-only">
            <span class="invalid-feedback feedback-no_ktp"></span>

        </div>
        <div class="form-group col-md-12">
            <label for="">Nomor HP</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control number-only">
            <span class="invalid-feedback feedback-no_hp"></span>

        </div>
        <div class="form-group col-md-12">
            <label for="">Email</label>
            <input type="email" name="email" id="email" class="form-control">
            <span class="invalid-feedback feedback-email"></span>

        </div>
        <div class="form-group col-md-12">
            <label for="">Kota</label>
            <input type="text" name="kota" id="kota" class="form-control">
            <span class="invalid-feedback feedback-kota"></span>

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
            <input type="hidden" name="username" id="username" class="no_hp_val">
            <span class="invalid-feedback feedback-username"></span>

        </div>
        <div class="form-group col-md-12">
            <label for="">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <span class="invalid-feedback feedback-password"></span>

        </div>
        <div class="form-group col-md-12">
            <label for="">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword">
            <span class="invalid-feedback feedback-cpassword"></span>

        </div>
    </div>
    <div class="d-flex row px-2 py-2 gap-2 border mt-3">
        <div class="form-group">
            <button type='button' onclick="formSubmit('#register-form', event)" class="btn btn-primary w-100">
                Sign Up
            </button>
            <span>
                Already have an account ? 
                <a href="" class="btn btn-link">Login Here !</a>
            </span>
        </div>
    </div>
</form>