<div id="article-detail" class="ps-4 row shadow-lg pb-4 px-4 py-3 card">
   <div class="card-body">
        <h1>{{ $articles->title }}</h1>
        <div class="d-flex gap-2">
        <p class="text-muted">{{ $articles->updated_at ? date('j F Y', strtotime($articles->updated_at)) :'-' }}</p>.<p class="text-muted">Author: {{ $articles->author->name }}</p>.
        <p>
            Category : 
            @forelse($articles->category as $index => $category)
                @if($index > 0)
                    ,
                @endif
                {{ $category->category_detail->category_name ?? '-' }}

            @empty
                No Category Found !
            @endforelse
        </p>
        </div>
        @if($gain_point)
            <span class="text-success d-none mb-4 fs-6 col-md-4 ms-2"><span id="timer" data-article-id="{{ $articles->id }}" class="mx-2">15</span>detik <span class="me-2"></span> </span>
        @endif
        <img src="https://cdn4.buysellads.net/uu/1/127574/1668535573-SSTK51.jpg" class="img-fluid rounded mt-4 mb-3 ratio ratio-21x9 shadow" style="max-height: 150px;object-fit: cover;
        object-position: top;" alt="">
        <div id="content" class="mt-2" style="text-align: justify; line-height: 1.3">
           <p>{{ $articles->body ?? '...' }}</p>
        </div>
   </div>
</div>