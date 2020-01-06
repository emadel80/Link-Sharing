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

          <div class="d-inline-block">
            <a href="?popular=true">Most Popular</a>
            <a class="pl-5" href="?popular=false">Most Recent</a>
          </div>
          

          @include('community.list')
        </div>
      
        @include('community.add-link')

    </div>  
@stop