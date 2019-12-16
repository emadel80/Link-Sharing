<ul class="list-group mb-5">
    @if (count($links))
      @foreach ($links as $link)
        <li class="list-group-item">
          <a href="/community/categories/{{ $link->category->slug }}" class="badge badge-pill badge-primary {{ $link->category->slug }}-badge">{{ $link->category->title }}</span>
          <a href="{{ $link->url }}" target="_blank">
            {{ $link->title }}
          </a>

          <small>
            Contributed By <a href="#">{{ $link->user->name }}</a>
            {{ $link->updated_at->diffForHumans() }}
          </small>
        </li>
      @endforeach
    @else
      <li class="list-group-item">
        No contributions yet.
      </li>
    @endif
    
  </ul>

  {{ $links->links() }}