<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="{{set_active('home')}}"><a class="nav-link" href="{{route('home')}}"><i class="far fa-square"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="menu-header">Menu</li>
      <li class="dropdown {{set_active(['post.index','post.trashed_post','post.create','post.edit'])}}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-newspaper"></i>
          <span>Posts</span></a>
        <ul class="dropdown-menu">
          <li class="{{set_active(['post.index','post.create','post.edit'])}}"><a class="nav-link" href="{{route('post.index')}}">Post List</a></li>
          <li class="{{set_active('post.trashed_post')}}"><a class="nav-link"
              href="{{route('post.trashed_post')}}">Trashed Post</a></li>
        </ul>
      </li>
      <li class="dropdown {{set_active(['category.index'])}}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i>
          <span>Category</span></a>
        <ul class="dropdown-menu">
          <li class="{{set_active('category.index')}}"><a class="nav-link" href="{{route('category.index')}}">Category
              List</a></li>
        </ul>
      </li>
    <li class="dropdown {{set_active(['tag.index'])}}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tags"></i>
          <span>Tag</span></a>
        <ul class="dropdown-menu">
        <li class="{{set_active('tag.index')}}"><a class="nav-link" href="{{route('tag.index')}}">Tag List</a></li>
        </ul>
      </li>
    <li class="dropdown {{set_active(['users.index', 'users.create', 'users.edit'])}}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i>
          <span>Users</span></a>
        <ul class="dropdown-menu">
          <li class="{{set_active(['users.index', 'users.create', 'users.edit'])}}"><a class="nav-link" href="{{route('users.index')}}">User List</a></li>
        </ul>
      </li>
      <li class="menu-header">Manager</li>
      <li class="{{set_active('filemanager.image')}}"><a class="nav-link" href="{{route('filemanager.image')}}"><i class="far fa-folder"></i> <span>File Manager</span></a>
      </li>

    </ul>
  </aside>
</div>