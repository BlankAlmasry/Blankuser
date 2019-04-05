<!-- navbar -->
<div class="p-0 no-gutters navbar navbar-dark fixed-top"  style="border-top:1px solid #aa5411;font-size:100%;background-color: black">
    <div class="container">
        <div class="col-2 col-sm-1 toggler d-md-none">
            <svg fill="white" width="25" height="25"
                 class="octicon octicon-grabber" viewBox="0 0 8 16" version="1.1" aria-hidden="true"><path fill-rule="evenodd" d="M8 4v1H0V4h8zM0 8h8V7H0v1zm0 3h8v-1H0v1z"></path></svg>
        </div>
        <div class="col-4 col-sm-5 col-md-3 col-lg-2 p-0">
            <a class="navbar-brand  d-inline" href="\">
                <div class="logo d-inline mx-sm-3">
                    <img src="\img/blanksquareoutline.jpg" width="30" height="30" class="d-inline align-top" alt="">
                    BlankUser
                </div>
            </a>
        </div>
        <div class="d-none d-md-inline-block   col-md-5 col-lg-4">
            <form class="form-inline  d-block w-100 search-form mb-0" method="get"  action="search">
                <div class="input-group input-group-sm my-1 ">
                        @csrf
                    <input type="text" id="searchbox" class="form-control form-control-sm border-0" placeholder="Search" aria-label="Search" minlength="1">
                    <div class="input-group-append">
                        <span class="input-group-text btn" id="searchbtn" onclick="if ($('#searchbox').val().length>0){ $('.search-form').submit()}"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </form>
        </div>
        <div class="px-0 col-6 my-1 col-sm-6 col-md-4 col-lg-5 lollol  ">
            <!-- user Interface -->
            @if(auth()->user())
            <div class="dropdown float-right  mr-1" >

                <a style="color:#93999e ;" href="#" class="user-name nav-link dropdown-toggle align float" data-toggle="dropdown">
                    <span class="" style="color:#63686d"><i class="fa fa-user d-none d-md-inline-block"></i> {{auth()->user()->name}}</span>
                </a>
                <div class="text-center  dropdown-menu border-dark dropdown-menu-right  " >
                    <a href="/profile" class="dropdown-item ">
                        <i class="fa fa-user-circle text-dark"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="/add-article" class="dropdown-item">
                        <p class="">Create Article</p>
                    </a>
                    <a href="/categories" class="dropdown-item">
                        Categories
                    </a>
                    <div class="dropdown-divider"></div>
                <a href="/logout" class="dropdown-item">
                        Logout
                    </a>
                </div>
            </div>
            @endif
            <!-- User Interface -->

            <!-- guest Interface-->
            @if(auth()->guest())
            <div class="div guest-interface float-right ">
                <a href="/login" class="btn btn-dark btn-sm mr-sm-3">Log In</a>
                <a href="/register" class="btn btn-dark btn-sm">Sign up</a>
            </div>
            @endif
            <!-- /guest Interface-->
        </div>

        <div class="col-0 d-none d-lg-block col-lg-1 "></div>



    </div></div>
<!-- navbar -->
<script>

</script>
