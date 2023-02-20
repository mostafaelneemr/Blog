    <!-- Left Sidebar start-->
    <div class="side-menu-fixed">
        <div class="scrollbar side-menu-bg">
         <ul class="nav navbar-nav side-menu" id="sidebarnav">
           <!-- menu item Dashboard-->
           <li>
             <a href="{{route('dashboard')}}">
               <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Dashboard</span></div>
             </a>
           </li>

           <!-- component -->
            <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Component</li>
           
            <!-- menu item Elements-->
            <li>
              <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">categories</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
              </a>
              <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">    
                <li> <a href="{{route('categories.create')}}">create category</a> </li>
                <li> <a href="{{route('categories.index')}}">view</a> </li>
              </ul>
            </li>
            
           <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
               <div class="pull-left"><i class="ti-palette"></i><span class="right-nav-text">Posts</span></div>
               <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
             </a>
             <ul id="elements" class="collapse" data-parent="#sidebarnav">
              <li> <a href="{{route('posts.create')}}">create Posts</a></li>
               <li><a href="{{route('posts.index')}}">view</a></li>
              </ul>
           </li>

           <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#pages">
              <div class="pull-left"><i class="ti-palette"></i><span class="right-nav-text">Pages</span></div>
              <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
            </a>
            <ul id="pages" class="collapse" data-parent="#sidebarnav">
             <li><a href="{{route('pages.create')}}">create Pages</a> </li>
              <li><a href="{{route('pages.index')}}">view</a></li>
             </ul>
           </li>
           
           <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#galley">
              <div class="pull-left"><i class="ti-palette"></i><span class="right-nav-text">galleries</span></div>
              <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
            </a>
            <ul id="galley" class="collapse" data-parent="#sidebarnav">
             <li><a href="{{route('galleries.create')}}">create gallery</a> </li>
              <li><a href="{{route('galleries.index')}}">view</a></li>
             </ul>
           </li>


           <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Permessions</li>
            <!-- permissions-->
            <li>
              <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                <div class="pull-left"><i class="ti-pie-chart"></i><span class="right-nav-text">Users</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
              </a>
              <ul id="chart" class="collapse" data-parent="#sidebarnav">
                <li> <a href=""></a> </li>
                <li> <a href=""></a> </li>
              </ul>
            </li>            
           <!-- menu item todo-->
           {{-- <li>
             <a href="todo-list.html"><i class="ti-menu-alt"></i><span class="right-nav-text">Todo list</span> </a>
           </li> --}}
            <!-- menu item chat-->
            {{-- <li> 
              <a href="chat-page.html"><i class="ti-comments"></i><span class="right-nav-text">Chat </span></a>  
            </li> --}}
            <!-- menu item mailbox-->
           {{-- <li>
             <a href="mail-box.html"><i class="ti-email"></i><span class="right-nav-text">Mail box</span> <span class="badge badge-pill badge-warning float-right mt-1">HOT</span> </a>
           </li> --}}
           <!-- menu title -->
           {{-- <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Widgets, Forms & Tables </li> --}}
           <!-- menu item Widgets-->
           {{-- <li>
             <a href="widgets.html"><i class="ti-blackboard"></i><span class="right-nav-text">Widgets</span> <span class="badge badge-pill badge-danger float-right mt-1">59</span> </a>
           </li> --}}
           <!-- menu item Form-->
           {{-- <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
               <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">Form & Editor</span></div>
               <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
             </a>
             <ul id="Form" class="collapse" data-parent="#sidebarnav">
               <li> <a href="editor.html">Editor</a> </li>
               <li> <a href="editor-markdown.html">Editor Markdown</a> </li>
               <li> <a href="form-input.html">Form input</a> </li>
               <li> <a href="form-validation-jquery.html">form validation jquery</a> </li>
               <li> <a href="form-wizard.html">form wizard</a> </li>
               <li> <a href="form-repeater.html">form repeater</a> </li>
               <li> <a href="input-group.html">input group</a> </li>
               <li> <a href="toastr.html">toastr</a> </li>
             </ul>
           </li> --}}
           <!-- menu item table -->
           {{-- <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
               <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">data table</span></div>
               <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
             </a>
             <ul id="table" class="collapse" data-parent="#sidebarnav">
               <li> <a href="data-html-table.html">Data html table</a> </li>
               <li> <a href="data-local.html">Data local</a> </li>
               <li> <a href="data-table.html">Data table</a> </li>
             </ul>
           </li>
           <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">More Pages</li> --}}
           </ul>
         </li>
       </ul>
     </div> 
   </div> 
   
   <!-- Left Sidebar End-->