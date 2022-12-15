<div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
    <div class="col-md-12 text-center">
        <h3>Our Newest Articles</h3>
    </div>
    @forelse($artikel as $index => $article)
        @if($index < 1)
        <div class="col-md-12">
            <div class="card h-100 shadow" data-slug="{{ $article->slug ?? '-' }}" onclick="articleNavigation($(this).attr('data-slug'))" style="cursor: pointer">
            <img src="{{ $article->image ?? 'https://source.unsplash.com/640x480?insurance-news-'.$index }}" style="object-fit:cover;" height="200" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title" style="text-transform: uppercase">{{$article->title ?? '.'}}</h5>
                <p class="card-text text-muted" style="line-height: 0%">
                    @foreach($article->category as $key => $val)
                        <span>@if($key > 0)
                        {{ e('.') }} 
                        @endif
                        {{$val->category_detail->category_name}}</span>
                    @endforeach
                    </p>
                <p class="card-text" style="line-height:1.2rem">{{ $article->body ?? '-' }}</p>
             
            </div>
            <div class="row card-body">
                <div class="text-start {{ Auth::check() ? 'col-md-6' : 'col-md-12 d-none' }}">
                    <div class="badge bg-{{ $article->point_type == 'repeated' ? 'success' : 'info'}}">{{ $article->point_type ?? '-' }}</div>
                </div>
                <div class="{{ Auth::check() ? 'col-md-6' : 'col-md-12' }}  text-end"><button class="btn btn-primary">Read More</button></div>
           </div>
            </div>
        </div>
        @else
        <div class="col">
            <div class="card h-100 shadow-sm no-border" data-slug="{{ $article->slug ?? '-' }}" onclick="articleNavigation($(this).attr('data-slug'))" style="cursor: pointer">
              <img src="{{ $article->image ?? 'https://source.unsplash.com/640x480?insurance-news-'.$index }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title" style="text-transform: uppercase">{{$article->title ?? '.'}}</h5>
                <p class="card-text text-muted" style="line-height: 0%">
                @foreach($article->category as $key => $val)
                    <span>@if($key > 0)
                    {{ e('.') }} 
                    @endif
                    {{$val->category_detail->category_name}}</span>
                @endforeach
                </p>
                
                <p class="card-text" style="line-height:1.2rem">{{ $article->body ?? '-' }}</p>
               
              </div>
              <div class="row card-body">
                    <div class="text-start {{ Auth::check() ? 'col-md-6' : 'col-md-12 d-none' }}">
                        <div class="badge bg-{{ $article->point_type == 'repeated' ? 'success' : 'info'}}">{{ $article->point_type ?? '-' }}</div>
                    </div>
                    <div class="{{ Auth::check() ? 'col-md-6' : 'col-md-12' }}  text-end"><button class="btn btn-primary">Read More</button></div>
              </div>
            </div>
          </div>
        @endif
    @empty
    @endforelse
   
    <div class="col-md-12 text-center">
        <a href="" class="btn btn-link">See More Articles</a>
    </div>
  </div>