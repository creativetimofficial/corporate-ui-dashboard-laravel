<nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-2">
        <nav aria-label="breadcrumb">
            <h6 class="font-weight-bold mb-0">CashXBet </h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group d-none">
                    <span class="input-group-text text-body bg-white  border-end-0 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </span>
                    <input type="text" class="form-control ps-0" placeholder="Search">
                </div>
            </div>
            
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <div class="mb-0 ms-4 font-weight-bold breadcrumb-text text-white">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
    
                        <a href="login" onclick="event.preventDefault();
                    this.closest('form').submit();">
                            <button class="btn btn-sm  btn-white  mb-0 me-1" type="submit">Log out</button>
                        </a>
                    </form>
                </div>
                
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
