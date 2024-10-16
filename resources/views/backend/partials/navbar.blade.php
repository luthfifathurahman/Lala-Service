          <!-- Navbar -->
          <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
              </li>
            </ul>


            <ul class="navbar-nav ml-auto">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="btn dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded>
                        <img src="<?=$avatar;?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?=$userinfo['firstname']." ".$userinfo['lastname']?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?=$avatar;?>" class="img-circle" alt="User Image">
                            <p>
                                <?=$userinfo['firstname']." ".$userinfo['lastname']?>
                            </p>
                        </li>
                        <!-- Menu Footer -->
                        <li class="user-footer">
                            <div class="float-left">
                                <a href="<?=url('backend/users-user/'.$userinfo['user_id'])?>" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="float-right">
                                <a href=" {{ url('backend/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
      </nav>