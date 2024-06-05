<!-- ======= Sidebar ======= -->

<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#contents" data-bs-toggle="collapse" href="#">
        <i class="bi bi-compass-fill"></i>
        <span>Navigate</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>

      <ul id="contents" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('user.index') }}">
            <i class="bi bi-person-workspace" style="font-size: 18px;"></i><span>Users</span>
          </a>
        </li>
        <li>
          <a href="{{ route('category.index') }}">
            <i class="bi bi-bookmark-plus" style="font-size: 18px;"></i><span>Book Categories</span>
          </a>
        </li>
        <li>
          <a href="{{ route('book.index') }}">
            <i class="bi bi-book-half" style="font-size: 18px;"></i><span>Books</span>
          </a>
        </li>
        <li>
          <a href="{{ route('member.index') }}">
            <i class="bi bi-person-fill-add" style="font-size: 18px;"></i><span>Members</span>
          </a>
        </li>
        <li>
          <a href="{{ route('borrowRecord.index') }}">
            <i class="bi bi-journal-bookmark-fill" style="font-size: 18px;"></i><span>Borrow Records</span>
          </a>
        </li>
      </ul>
    </li><!-- End Components Nav -->

  </ul>

</aside><!-- End Sidebar-->