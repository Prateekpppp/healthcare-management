

        <!-- Header Section Start -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          @if(array_key_exists('index',$permissions))

          <?php unset($permissions['index']) ?>
          <li class="nav-item"> 
            <a class="nav-link" href="{{route('pages.index')}}">
              <i class="icon-menu menu-icon"></i>
              <span class="menu-title">Dashboard</span>
              <span class="badge badge-success">New</span>
            </a>
          </li>
          @endif

          @foreach($permissions as $key=>$permission)
          <li class="nav-item">
            <a class="nav-link" href="{{route('pages.'.$key)}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">{{$permission}}</span>
            </a>
          </li>
          @endforeach
        </ul>
      </nav>
