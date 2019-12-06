<div class="col-md-4">
  @auth
    <h3>Contribute a Link</h3>

      <div class="card">
        <div class="card-body">
          <form method="POST" action="/community">
            @csrf

            <div class="form-group">
              <h6 class="card-title">Title:</h6>
              <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" name="title" placeholder="What is the title of your article?">
                
              {!! $errors->first('title', '<span class="invalid-feedback">:message</span>') !!}   
            </div>
            
            <div class="form-group">
              <h6 class="card-title">Link:</h6>
              <input type="text" class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" id="url" name="url" placeholder="What is the URL?">

              {!! $errors->first('url', '<span class="invalid-feedback">:message</span>') !!}  
            </div>
            
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Contribute Link</button>
            </div>
          </form>
        </div>
      </div>
  @endauth
        
  @guest
    <p>Please, <a href="/login">sign in</a> to contribute a link.</p>
  @endguest
</div>