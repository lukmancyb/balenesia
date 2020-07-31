<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class=active><a class="nav-link" href="{{url('/')}}"><i class="far fa-square"></i> <span>Dashboard</span></a>
      </li>
      <li class="menu-header">Starter</li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
          <span>Posts</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{route('post.index')}}">Post List</a></li>
          <li><a class="nav-link" href="{{route('post.trashed_post')}}">Trashed Post</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
          <span>Category</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{route('category.index')}}">Category List</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
          <span>Tag</span></a>
        <ul class="dropdown-menu">
        <li><a class="nav-link" href="{{route('tag.index')}}">Tag List</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i>
          <span>Users</span></a>
        <ul class="dropdown-menu">
        <li><a class="nav-link" href="{{route('users.index')}}">User List</a></li>
        </ul>
      </li>
      <li class=active><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a>
      </li>

    </ul>
  </aside>
</div>