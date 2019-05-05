<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="/dashboard">
                    <i class="nav-icon icon-menu"></i> Main menu
                </a>
            </li>
            <li class="nav-item nav-dropdown ">
                <a class="nav-link nav-dropdown-toggle"  href="#">
                    <i class="icon-calendar "></i>
                    Periods
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('period.create') }}">
                        <i class="icon-plus  "></i>
                        Add New Period
                    </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('period.index') }}">
                            <i class="icon-layers "></i>
                            Show Periods
                        </a>
                    </li>
                </ul>
            </li>
            <!-- <li class="nav-item nav-dropdown ">
                    <a class="nav-link nav-dropdown-toggle"  href="#">
                        <i class="fas fa-coins"></i>
                        Expenses
                    </a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('period.create') }}">
                            <i class="icon-plus  "></i>
                            Add New Expense
                        </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('period.index') }}">
                                <i class="fas fa-balance-scale"></i>
                                Show Expenses
                            </a>
                        </li>
                    </ul>
            </li> -->
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>