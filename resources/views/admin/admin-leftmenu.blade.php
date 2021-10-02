<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">   
    <section class="sidebar">      
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('images/admin/admin_icon.png')}}"  class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }} </p>          
        </div>
      </div>
     
      <ul class="sidebar-menu">
        <li class="header">{{trans ('admin.HEADER') }}</li>
        <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> <span>{{trans ('admin.Dashboard') }}</span></a></li>
		
		<li>
          <a href="/admin/usermanagement"><i class="fa fa-user"></i>  <span>{{trans ('admin.User_Management') }}</span>            
          </a>          
        </li>
		<li>
          <a href="/admin/categorymanagement"><i class="fa fa-list" aria-hidden="true"></i> <span>{{trans ('admin.Category_Management') }}</span>           
          </a>          
        </li>
		<li class="treeview">
          <a href="/admin/categorymanagement"> <i class="fa fa-gg" aria-hidden="true"></i> <span>{{trans ('admin.Sub_Category_Management') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">            
            <li><a href="/admin/subcategorymanagement"><i class="fa fa-circle-o text-red"></i>{{trans ('admin.Sub_Category_CURD') }}</a></li>	
			<li><a href="/admin/assignsubcategory"><i class="fa fa-circle-o text-blue"></i>{{trans ('admin.Sub_Category_Assignment') }}</a></li>
          </ul>
        </li>
		
		<li><a href="/admin/appointmentmanagement"> <i class="fa  fa-table" aria-hidden="true"></i><span>{{trans ('admin.Appointments_Management') }}</span></a></li>
		
		<li><a href="/admin/newsmanagement"> <i class="fa fa-newspaper-o" aria-hidden="true"></i><span>{{trans ('admin.News_Management') }}</span></a></li>
		<li><a href="/admin/messagemanagement"> <i class="fa fa-envelope" aria-hidden="true"></i><span>{{trans ('admin.Message_Management') }}</span></a></li>
        <li class="treeview">
          <a href="/admin/librarymanagement"> <i class="fa fa-folder-open-o" aria-hidden="true"></i> <span>{{trans ('admin.Library_Management') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">            
            <li><a href="/admin/quranmenu"><i class="fa fa-circle-o text-red"></i>{{trans ('admin.Quran_Menu_Management') }}</a></li>	
			<li><a href="/admin/librarycategory"><i class="fa fa-circle-o text-blue"></i>{{trans ('admin.Library_Category_Management') }}</a></li>
			<li><a href="/admin/librarysubcategory"><i class="fa fa-circle-o text-yellow"></i>{{trans ('admin.Library_Sub_Category Management') }}</a></li>
			<li><a href="/admin/libraryitems"><i class="fa fa-circle-o text-orange"></i>{{trans ('admin.Library_Items_Management') }}</a></li>
          </ul>
        </li>
      </ul>     
    </section>
</aside>