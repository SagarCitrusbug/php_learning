<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-inverse">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">{{ config('app.name', 'Laravel Day 4') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/service">Service</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/posts">Post</a>
        </li>
      </ul>
      <ul class='nav navbar-nav navbar-right'>
        <li class="nav-item">
          <a class="nav-link" href='/posts/create' >Create Post</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>