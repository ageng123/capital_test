<div class="card card-light">
    <div class="card-body">
        <h2 class="card-title">Profile Information</h2>
        <h4 class="card-subtitle alert alert-success">Selamat Datang, {{ $data->name }}</h4>
        <div class="bg-light mt-2 px-2 py-2">
            <div class="table-responsive shadow-sm">
                <table class="table table-striped">
                    <tr>
                        <td colspan="3" class="text-center"><h5><b>Data Diri User</b></h5></td>
                    </tr>
                    <tr>
                        <td><b>No Ktp</b></td>
                        <td width="1%">:</td>
                        <td id="no_ktp">{{ $data->user_detail->no_ktp}}</td>
                    </tr>
                    
                    <tr>
                        <td><b>No. HP</b></td>
                        <td width="1%">:</td>
                        <td id="no_hp">{{ $data->user_detail->no_hp}}</td>
                    </tr>
                    <tr>
                        <td><b>E-mail</b></td>
                        <td width="1%">:</td>
                        <td id="email">{{ $data->email}}</td>
                    </tr>
                    <tr>
                        <td><b>Member Sejak</b></td>
                        <td width="1%">:</td>
                        <td id="members">{{ date('j F Y', strtotime($data->created_at)) }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>