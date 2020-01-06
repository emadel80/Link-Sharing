<ul class="list-group mb-5">
    @if (count($links))
      @foreach ($links as $link)
        <li class="list-group-item">
              <form class="form-inline" method="POST" action="/votes/{{ $link->id }}">
                @csrf

                <div class="votes-btn-width">
                  <button type="submit" class="btn {{ auth()->user() && auth()->user()->votedFor($link) ? 'btn-success' : 'btn-light' }}"
                      {{ auth()->guest() ? 'disabled': '' }}
                    >
                    {{ $link->votes->count() }}
                  </button>  
                </div>

                <div class="badge-width">
                  <a href="/community/categories/{{ $link->category->slug }}" class="badge badge-pill badge-primary {{ $link->category->slug }}-badge mr-md-4">{{ $link->category->title }}</a>
                </div>

                <div class="link-width">
                    <a class="mr-auto" href="{{ $link->url }}" target="_blank">
                      {{ $link->title }}
                    </a>  
                </div>

                <div class="spacer"></div>
                
                <small>
                  Contributed By <a href="#">{{ $link->user->name }}</a>
                  {{ $link->updated_at->diffForHumans() }}
                </small>
                
                  
              </form>
        </li>
      @endforeach
    @else
      <li class="list-group-item">
        No contributions yet.
      </li>
    @endif
  </ul>

  {{ $links->appends(request()->query())->links() }}