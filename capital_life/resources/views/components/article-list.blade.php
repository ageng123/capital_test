<div class="card shadow px-3 py-4">
    <div class="card-title">
        <h2>Capital Articles</h2>
    </div>
    <div class="card-subtitle">
        <h5>All Article</h5>
    </div>
    <div class="row gx-2">
        @foreach($articles as $article)
            <div class="col-sm-12 col-md-6 col-lg-3 px-2 py-3">
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
        @endforeach
    </div>
    <div class="card-subtitle mt-4">
        <h5>Repeated Achieve Article</h5>
    </div>
    <div class="row gx-2">
        @foreach($articles as $article)
            <div class="col-sm-12 col-md-6 col-lg-3 px-2 py-3">
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
        @endforeach
    </div>
    <div class="card-subtitle mt-4">
        <h5>One-Time Achieve Article</h5>
    </div>
    <div class="row gx-2">
        @foreach($oneTime as $article)
            <div class="col-sm-12 col-md-6 col-lg-3 px-2 py-3">
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
        @endforeach
    </div>
</div>