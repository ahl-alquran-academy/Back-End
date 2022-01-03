 <!-- Begin Header -->
 <nav class="navbar navbar-expand bg-info fixed-top position-sticky text-right">
     <ul id="myNavbar" dir="rtl" class="nav navbar-nav d-none d-md-flex">
         <!--username of addmin-->
         <li class="dropdown dropdown-user nav-item">
             <a class="dropdown-toggle nav-link dropdown-user-link text-white" href="#" data-toggle="dropdown">
                 <span class="ml-1">مرجبا
                     <span class="user-name text-bold-700"> <?php echo $_SESSION['adminName']; ?> </span>
                 </span>
                 <span class="avatar avatar-online">
                     <img style="height: 35px;" src="../Resources/images/icons/ico.jpg" alt="avatar"
                         class="rounded-circle" />
                 </span>
             </a>
             <div class="dropdown-menu dropdown-menu-right">
                 <a class="dropdown-item" href="">
                     <i class="fas fa-user"></i>
                     تعديل الملف الشحصي
                 </a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="logout.php">
                     <i class="fas fa-sign-out-alt"></i>
                     تسجيل الخروج
                 </a>
             </div>
         </li>
         <!--notification-->
         <li class="dropdown dropdown-notification nav-item">
             <a class="nav-link nav-link-label text-white" href="#" data-toggle="dropdown" title="Notifications"
                 aria-expanded="false">
                 <i class="far fa-bell"></i>
                 <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">5</span>
             </a>
             <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                 <li class="dropdown-menu-header text-right">
                     <h6 class="dropdown-header m-0">
                         <span class="grey darken-2">الأشعارات</span>
                     </h6>
                     <span class="notification-tag badge badge-default badge-danger float-left m-0">5 New</span>
                 </li>
                 <li class="scrollable-container media-list w-100 ps-container ps-theme-dark"
                     data-ps-id="d2978418-cc8e-592e-dcf4-00c2a8511f6d">
                     <a href="javascript:void(0)">
                         <div class="media">
                             <div class="media-left align-self-center"><i
                                     class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                             <div class="media-body text-right">
                                 <h6 class="media-heading">أشعارات جديدة!</h6>
                                 <p class="notification-text font-small-3 text-muted">
                                     عرض الأشعارات الجديدة
                                 </p>
                             </div>
                         </div>
                     </a>
                     <!--natification 1-->
                     <a href="#">
                         <div class="media">
                             <div class="media-left align-self-center"><i
                                     class="ft-download-cloud icon-bg-circle bg-red bg-darken-1"></i></div>
                             <div class="media-body text-right">
                                 <h6 class="media-heading red darken-1">أشعار رقم 1</h6>
                                 <p class="notification-text font-small-3 text-muted">معلومات عن الاشعار</p>
                                 <small>
                                     <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Five
                                         hour ago
                                     </time>
                                 </small>
                             </div>
                         </div>
                     </a>

                 </li>
                 <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="#">عرض كل
                         الأشعارات</a>
                 </li>
             </ul>
         </li>
         <!--Messages-->
         <li class="dropdown dropdown-notification nav-item">
             <a class="nav-link nav-link-label text-white" href="#" data-toggle="dropdown" aria-expanded="false">
                 <i class="far fa-envelope"></i>
             </a>
             <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                 <li class="dropdown-menu-header text-right">
                     <h6 class="dropdown-header m-0">
                         <span class="grey darken-2">الرسائل</span>
                     </h6>
                 </li>
                 <li class="scrollable-container media-list w-100 ps-container ps-theme-dark ps-active-y"
                     data-ps-id="8118129b-a2d7-99b0-508d-9a0ed092bfef">
                     <!--message 1-->
                     <a href="#">
                         <div class="media">
                             <div class="media-left">
                                 <span class="avatar avatar-sm avatar-online rounded-circle">
                                     <img class="rounded-circle" src="../Resources/images/icons/ico.jpg" width="35"
                                         height="40" alt="avatar">
                                 </span>
                             </div>
                             <div class="media-body text-right">
                                 <h6 class="media-heading">رسالة من الزمان</h6>
                                 <p class="notification-text font-small-3 text-muted">أحذرني فقولي مضحك و فعلي مبكي..
                                 </p>
                                 <small>
                                     <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">
                                         Today
                                     </time>
                                 </small>
                             </div>
                         </div>
                     </a>
                     <!--message 2-->
                     <a href="#">
                         <div class="media">
                             <div class="media-left">
                                 <span class="avatar avatar-sm avatar-online rounded-circle">
                                     <img class="rounded-circle" src="../Resources/images/icons/ico.jpg" width="35"
                                         height="40" alt="avatar">
                                 </span>
                             </div>
                             <div class="media-body text-right">
                                 <h6 class="media-heading">رسالة من الزمان</h6>
                                 <p class="notification-text font-small-3 text-muted">أحذرني فقولي مضحك و فعلي مبكي..
                                 </p>
                                 <small>
                                     <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">
                                         Today
                                     </time>
                                 </small>
                             </div>
                         </div>
                     </a>
                 </li>
                 <li class="dropdown-menu-footer">
                     <a class="dropdown-item text-muted text-center" href="#">Read all
                         messages
                     </a>
                 </li>
             </ul>
         </li>
         <!--search-->
         <form class="form-inline" action="#">
             <input class="form-control mr-sm-2" name="search" type="text" placeholder="بحث عن ..">
             <select name="searchAbout" class="custom-select">
                 <option selected>طالب</option>
                 <option>شيخ</option>
                 <option>مستوي</option>
             </select>
             <button class="btn btn-warning" type="submit">
                 <i class="fas fa-search"></i>
                 <span class="d-xs-inline d-md-none">بحث</span>
             </button>
         </form>
     </ul>
     <span class="navbar-brand m-auto h1 text-white">أكاديمية أهل القران الكريم</span>
     <ul class="nav navbar-nav ml-auto float-right">
         <li class="nav-item text-right">
             <button data-toggle="tooltip" title="hide sidebar!" value="hide" id="sidebar-toggle"
                 class="btn btn-light nav-link  hidden-xs is-active text-white">
                 <i class="fas fa-bars text-dark"></i>
             </button>
         </li>
     </ul>
 </nav>
 <!-- End  Header -->