<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{ Route('adminhome') }}">
                <img src="https://ik.imagekit.io/pk330050/Manga_Holder/img/Logo_rdpiz3bCI.jpg?ik-sdk-version=javascript-1.4.3&updatedAt=1653463318218"
                    height="30px" alt="">
            </a>
        </div>
        <div class="search-bar">
            <form action="{{ route('admintimkiem_admin') }}" method="post">
                @csrf
                <button class="search-icon btn" type="submit" style="width: 40px; height:33px;">
                    <i class="material-icons">search</i>
                </button>
                <input type="text" placeholder="Tìm truyện theo tên..." name="txtSearch" required>
                <div class="close-search">
                    <i class="material-icons">close</i>
                </div>
            </form>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
                        <i class="material-icons" style="color: white">notifications</i>
                        <span class="label-count" style="color: white">7</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Thông báo</li>
                        <li class="body">
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 254px;"><ul class="menu" style="overflow: hidden; width: auto; height: 254px;">
                                <li>
                                    <a href="javascript:void(0);" class=" waves-effect waves-block">
                                        <div class="icon-circle bg-light-green">
                                            <i class="material-icons">person_add</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>12 new members joined</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 14 mins ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class=" waves-effect waves-block">
                                        <div class="icon-circle bg-cyan">
                                            <i class="material-icons">add_shopping_cart</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>4 sales made</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 22 mins ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class=" waves-effect waves-block">
                                        <div class="icon-circle bg-red">
                                            <i class="material-icons">delete_forever</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><b>Nancy Doe</b> deleted account</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 3 hours ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class=" waves-effect waves-block">
                                        <div class="icon-circle bg-orange">
                                            <i class="material-icons">mode_edit</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><b>Nancy</b> changed name</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 2 hours ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class=" waves-effect waves-block">
                                        <div class="icon-circle bg-blue-grey">
                                            <i class="material-icons">comment</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><b>John</b> commented your post</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 4 hours ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class=" waves-effect waves-block">
                                        <div class="icon-circle bg-light-green">
                                            <i class="material-icons">cached</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><b>John</b> updated status</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 3 hours ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class=" waves-effect waves-block">
                                        <div class="icon-circle bg-purple">
                                            <i class="material-icons">settings</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>Settings updated</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> Yesterday
                                            </p>
                                        </div>
                                    </a>
                                </li>
                            </ul><div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 4px; position: absolute; top: 36px; opacity: 0.4; display: none; border-radius: 0px; z-index: 99; right: 1px; height: 180.212px;"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                        </li>
                        <li class="footer">
                            <a href="javascript:void(0);" class=" waves-effect waves-block">View All Notifications</a>
                        </li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="js-search" data-close="true"><i
                            class="material-icons" style="color: white">search</i></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar -->
