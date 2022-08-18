<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/home">OnSite</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{asset('home/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{asset('home/create')}}">Add product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{asset('profile/')}}">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-primary" href="{{asset('logout/')}}">Log out</a>
        </li>
      </ul>
      <img style="width:60px; height:60px;" class="rounded-circle" src="{{asset('profile_images/'.Session::get('profilePicture'))}}" alt="profile picture">
    </div>
  </div>
</nav>