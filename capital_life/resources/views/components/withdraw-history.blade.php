@if(empty($history) || count($history) == 0)
    <div class="alert alert-danger w-100">Anda Belum Pernah Melakukan Withdrawal. <br>Kumpulkan Point dan dapatkan achievement pertama anda !</div>
@else
    <div class="table-responsive w-100">
        <table class="table table-striped table-bordered">
            <thead>
                <td>Time</td>
                <td>Status</td>
                <td>Amount</td>
                <td>No Rekening tujuan</td>
            </thead>
            <tbody>
                @foreach($history as $index => $data)
                <tr>
                <td>{{ $data->updated_at ? date('j F Y H:i', strtotime($data->updated_at)) : '-' }}</td>
                <td>{!! $data->withdraw_status_text ?? '-' !!}</td>
                <td>{{ $data->withdraw_amount ? 'Rp. '.number_format($data->withdraw_amount, 0, ',', '.') : '0' }}</td>
                <td>({{$data->kode_bank}}) - {{ $data->no_rek_tujuan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif