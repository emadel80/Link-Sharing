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
      
          

          @include('community.list')
        </div>
      
        @include('community.add-link')

    </div>  
@stop