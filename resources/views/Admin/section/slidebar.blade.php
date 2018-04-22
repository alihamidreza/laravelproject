<nav class="col-md-2 d-none d-md-block bg-light sidebar" style="float: right!important;right: 0;border-left: 1px solid rgba(0, 0, 0, 0.25);position: relative">
    <div class="sidebar-sticky" align="right">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="/panel">
                    <span data-feather="home"></span>
                    صفحه اصلی <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="shopping-cart"></span>
                                   خریدها<span class="badge" style="background-color: #32383e;color: white;margin-right: 5px;">  0  </span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link" href="/admin/users">
                    <span data-feather="users"></span>
                    کاربران<span class="badge" style="background-color: #32383e;color: white;margin-right: 5px;">  0  </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2"></span>
                    آمار<span class="badge" style="background-color: #32383e;color: white;margin-right: 5px;">  0  </span>
                </a>
            </li>
            @can('show-comment')
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="users"></span>
                    کامنت ها<span class="badge" style="background-color: #32383e;color: white;margin-right: 5px;">  0  </span>
                </a>
            </li>
            @endcan
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>محتوا وبسایت</span>
            <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            @can('show-article')
            <li class="nav-item">
                <a class="nav-link" href="/admin/Article">
                    <span data-feather="file-text"></span>
                    مقالات
                </a>
            </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link" href="/admin/Course">
                    <span data-feather="file-text"></span>
                    دوره ها
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/Episode">
                    <span data-feather="file-text"></span>
                    قسمت ها
                </a>
            </li>
        </ul>
    </div>
</nav>