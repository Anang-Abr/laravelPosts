<nav class="navbar navbar-expand-lg bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand text-light" href="/home">BLOGS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-light {{ ($title == "Home") ? "active" : "" }}" aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light {{ ($title == "About") ? "active" : "" }}" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light {{ ($title == "Blogs") ? "active" : "" }}" href="/blogs">Blogs</a>
        </li>
      </ul>
    </div>
  </div>
</nav>