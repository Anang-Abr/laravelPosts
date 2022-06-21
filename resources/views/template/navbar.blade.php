<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container">
    <a class="navbar-brand text-light" href="/home">BLOGS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-light {{ (request()->segment(1) == "home") ? "active" : "" }}" aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light {{ (request()->segment(1) == "about") ? "active" : "" }}" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light {{ (request()->segment(1) == "blogs") ? "active" : "" }}" href="/blogs">Blogs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light {{ (request()->segment(1) == "category") ? "active" : "" }}" href="/category">Category</a>
        </li>
         
      </ul>
      <form class="d-flex " role="search" action='/blogs' >
          <input class="form-control me-2" type="search" placeholder="Search" autocomplete="off" name="search" value={{ request('search') }}>
          <button class="btn btn-outline-success" type="submit" >Search</button>
        </form>
    </div>
  </div>
</nav>