@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-8">
          <h1>Community</h1>
      
          <ul class="list-group">
            @foreach ($links as $link)
              <li class="list-group-item">
                <span class="badge badge-pill badge-primary {{ $link->category->slug }}-badge">{{ $link->category->title }}</span>
                <a href="{{ $link->url }}" target="_blank">
                  {{ $link->title }}
                </a>
    
                <small>
                  Contributed By <a href="#">{{ $link->user->name }}</a>
                  {{ $link->updated_at->diffForHumans() }}
                </small>
              </li>
            @endforeach
          </ul>
        </div>
      
        @include('community.add-link')

    </div>  
  </div>
@stop