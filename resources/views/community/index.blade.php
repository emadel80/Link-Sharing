@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
          <h1>
            <a href="/community">Community</a>

            @if (optional($category)->exists)  
              <span>&mdash; {{ $category->title }}</span>
            @endif
          </h1>

          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link {{ request()->exists('popular') ? 'active' : '' }}" href="?popular=true">Most Popular</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link {{ request()->exists('popular') ? '' : 'active' }}" href="{{ request()->url() }}">Most Recent</a>
            </li>
            
          </ul>
          

          @include('community.list')
        </div>
      
        @include('community.add-link')

    </div>  
@stop