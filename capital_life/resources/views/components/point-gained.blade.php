@if(empty($point_gained) || count($point_gained) == 0)
    <div class="alert alert-danger w-100">Anda Belum Pernah Mendapatkan Point. <br>Kumpulkan Point dengan membaca artikel menarik milik kami !</div>
@else
    <div class="table-responsive">
        <table class="table-striped table">
            <thead>
                <td>Gained From</td>
                <td>Point Gained Amount</td>
                <td>Gained Time</td>
            </thead>
            <tbody>
                @foreach($point_gained as $index => $val)
                <tr>
                    <td>{{ $val->article->title ? 'Artikel: '.$val->article->title :  '-' }}</td>
                    <td>{{ $val->point_amount ?? 0 }}</td>
                    <td>{{ $val->updated_at ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endif