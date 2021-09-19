        <div class="side-content-wrap">
            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
                <ul class="navigation-left">
                    <li class="nav-item re_active">
                        <a class="nav-item-hold" href="{{ url('/') }}">
                            <i class="nav-icon i-Dashboard"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="vendor">
                        <a class="nav-item-hold" href="{{ url('vendor') }}">
                            <i class="nav-icon i-Shop-2"></i>
                            <span class="nav-text">Vendor Management</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="sponsored_vendor_plans">
                        <a class="nav-item-hold" href="{{ url('sponsored_vendor_plans') }}">
                            <i class="nav-icon i-Folder-Search"></i>
                            <span class="nav-text">Sponsored Vendor Plans</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
    
                    <li class="nav-item" data-item="featured_vendor_plans">
                        <a class="nav-item-hold" href="{{ url('featured_vendor_plans') }}">
                            <i class="nav-icon i-Folder-Search"></i>
                            <span class="nav-text">Featured Vendor Plans</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
    
                    <li class="nav-item" data-item="customer_management">
                        <a class="nav-item-hold" href="{{ url('customer_management') }}">
                            <i class="nav-icon i-Management"></i>
                            <span class="nav-text">Customer Management</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
    
                    <li class="nav-item" data-item="driver_management">
                        <a class="nav-item-hold" href="{{ url('driver_management') }}">
                            <i class="nav-icon i-Optimization"></i>
                            <span class="nav-text">Driver Management</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
    
                    <li class="nav-item" data-item="chats">
                        <a class="nav-item-hold" href="{{ url('chats') }}">
                            <i class="nav-icon i-Mail-Unread"></i>
                            <span class="nav-text">Chats</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="FAQs">
                        <a class="nav-item-hold" href="{{ url('FAQs') }}">
                            <i class="nav-icon i-Folder-Search"></i>
                            <span class="nav-text">FAQs</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="system">
                        <a class="nav-item-hold" href="{{ url('system') }}">
                            <i class="nav-icon i-Management"></i>
                            <span class="nav-text">System Management</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="banners">
                        <a class="nav-item-hold" href="{{ url('banners') }}">
                            <i class="nav-icon i-Posterous"></i>
                            <span class="nav-text">Banners Management</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
    
                    <li class="nav-item" data-item="notifications">
                        <a class="nav-item-hold" href="{{ url('notifications') }}">
                            <i class="nav-icon i-Mail-3"></i>
                            <span class="nav-text">Send Notifications</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
    
    
                    <li class="nav-item" data-item="coupons">
                        <a class="nav-item-hold" href="{{ url('coupons') }}">
                            <i class="nav-icon i-Ticket"></i>
                            <span class="nav-text">Coupons Management</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="custom_pages">
                        <a class="nav-item-hold" href="{{ url('custom_pages') }}">
                            <i class="nav-icon i-Ticket"></i>
                            <span class="nav-text">Custom Pages</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
    
                    <li class="nav-item" data-item="subdomains">
                        <a class="nav-item-hold" href="{{ url('subdomains') }}">
                            <i class="nav-icon i-Globe"></i>
                            <span class="nav-text">SubAdmins</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="logs">
                        <a class="nav-item-hold" href="{{ url('logs') }}">
                            <i class="nav-icon i-Code-Window"></i>
                            <span class="nav-text">Logs</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
    
                    <li class="nav-item" data-item="settings">
                        <a class="nav-item-hold" href="{{ url('settings') }}">
                            <i class="nav-icon i-Settings-Window"></i>
                            <span class="nav-text">Settings</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
    
    
                </ul>
            </div>

            <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">


                <ul class="childNav" data-parent="vendor">
                    <li class="nav-item">
                        <a href="{{url('view/allvendor')}}">
                            <i class="nav-icon i-Full-View-Window"></i>
                            <span class="item-name">View All Vendors</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="form.layouts.html">
                            <i class="nav-icon i-Approved-Window"></i>
                            <span class="item-name">Vendor Approvals</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="form.input.group.html">
                            <i class="nav-icon i-Statistic"></i>
                            <span class="item-name">Vendor Stats</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="form.validation.html">
                            <i class="nav-icon i-Paypal"></i>
                            <span class="item-name">Vendor Payouts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('create/vendor')}}">
                            <i class="nav-icon i-Add"></i>
                            <span class="item-name">Create New Vendor</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tag.input.html">
                            <i class="nav-icon i-Folder-Settings"></i>
                            <span class="item-name">Approve Products </span>
                        </a>
                    </li>
                </ul>


                <ul class="childNav" data-parent="settings">
                    <li class="nav-item">
                        <a href="form.basic.html">
                            <i class="nav-icon i-Settings-Window"></i>
                            <span class="item-name">Product Unit</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="form.layouts.html">
                            <i class="nav-icon i-Settings-Window"></i>
                            <span class="item-name">Payment Gateways</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="form.input.group.html">
                            <i class="nav-icon i-Settings-Window"></i>
                            <span class="item-name">Vendor Stats</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="form.validation.html">
                            <i class="nav-icon i-Settings-Window"></i>
                            <span class="item-name">Default Delivery Radius</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="smart.wizard.html">
                            <i class="nav-icon i-Settings-Window"></i>
                            <span class="item-name">SMS Settings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tag.input.html">
                            <i class="nav-icon i-Settings-Window"></i>
                            <span class="item-name">WhatsApp Settings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tag.input.html">
                            <i class="nav-icon i-Settings-Window"></i>
                            <span class="item-name">Maps Settings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tag.input.html">
                            <i class="nav-icon i-Settings-Window"></i>
                            <span class="item-name">Powered by text</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tag.input.html">
                            <i class="nav-icon i-Settings-Window"></i>
                            <span class="item-name">App Settings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/settings/mobileui') }}">
                            <i class="nav-icon i-Settings-Window"></i>
                            <span class="item-name">Mobile UI</span>
                        </a>
                    </li>
                </ul>


                <ul class="childNav" data-parent="driver_management">
                    <li class="nav-item">
                        <a href="form.basic.html">
                            <i class="nav-icon i-Full-View-Window"></i>
                            <span class="item-name">Pending Requests</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="form.basic.html">
                            <i class="nav-icon i-Full-View-Window"></i>
                            <span class="item-name">All Drivers</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="form.layouts.html">
                            <i class="nav-icon i-Approved-Window"></i>
                            <span class="item-name">Add Driver</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="form.input.group.html">
                            <i class="nav-icon i-Statistic"></i>
                            <span class="item-name">Track Drivers</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="form.validation.html">
                            <i class="nav-icon i-Paypal"></i>
                            <span class="item-name">Delivery Settings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="smart.wizard.html">
                            <i class="nav-icon i-Add"></i>
                            <span class="item-name">Payout Requests</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tag.input.html">
                            <i class="nav-icon i-Folder-Settings"></i>
                            <span class="item-name">Driver Deposits</span>
                        </a>
                    </li>
                </ul>
                <ul class="childNav" data-parent="customer_management">
                    <li class="nav-item">
                        <a href="dashboard.v1.html">
                            <i class="nav-icon i-Full-View-Window"></i>
                            <span class="item-name">List All</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v2.html">
                            <i class="nav-icon i-Add"></i>
                            <span class="item-name">Create New</span>
                        </a>
                    </li>
                </ul>
                
                <ul class="childNav" data-parent="custom_pages">
                    <li class="nav-item">
                        <a href="{{ url('/view/pages') }}">
                            <i class="nav-icon i-Full-View-Window"></i>
                            <span class="item-name">List Custom page</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/create/pages') }}">
                            <i class="nav-icon i-Add"></i>
                            <span class="item-name">Add Custom Page</span>
                        </a>
                    </li>
                </ul>
                
                
                <ul class="childNav" data-parent="subdomains">
                    <li class="nav-item">
                        <a href="dashboard.v1.html">
                            <i class="nav-icon i-Full-View-Window"></i>
                            <span class="item-name">View List</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v2.html">
                            <i class="nav-icon i-Add"></i>
                            <span class="item-name">Create New</span>
                        </a>
                    </li>
                </ul>
                
                <ul class="childNav" data-parent="logs">
                    <li class="nav-item">
                        <a href="dashboard.v1.html">
                            <i class="nav-icon i-Full-View-Window"></i>
                            <span class="item-name">Admin Panel Logs</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v1.html">
                            <i class="nav-icon i-Full-View-Window"></i>
                            <span class="item-name">User App Logs</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v1.html">
                            <i class="nav-icon i-Full-View-Window"></i>
                            <span class="item-name">Vendor App Logs</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v1.html">
                            <i class="nav-icon i-Full-View-Window"></i>
                            <span class="item-name">Driver App Logs</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v1.html">
                            <i class="nav-icon i-Full-View-Window"></i>
                            <span class="item-name">Vendor Sites Logs</span>
                        </a>
                    </li>
                </ul>
                
                <ul class="childNav" data-parent="chats">
                    <li class="nav-item">
                        <a href="dashboard.v1.html">
                            <i class="nav-icon i-Mail-Send"></i>
                            <span class="item-name">Chat with Vendors</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v2.html">
                            <i class="nav-icon i-Mail-Send"></i>
                            <span class="item-name">Chat with Customers</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v2.html">
                            <i class="nav-icon i-Mail-Send"></i>
                            <span class="item-name">Chat with Drivers</span>
                        </a>
                    </li>
                </ul>
                
                <ul class="childNav" data-parent="FAQs">
                    <li class="nav-item">
                        <a href="{{url('faqs')}}">
                            <i class="nav-icon i-Full-View-Window"></i>
                            <span class="item-name">View All</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('create/faqs')}}">
                            <i class="nav-icon i-Add"></i>
                            <span class="item-name">Add New</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('faqs/category')}}">
                            <i class="nav-icon i-Optimization"></i>
                            <span class="item-name">Manage Category</span>
                        </a>
                    </li>
                </ul>
                
                <ul class="childNav" data-parent="coupons">
                    <li class="nav-item">
                        <a href="{{url("/coupons")}}">
                            <i class="nav-icon i-Full-View-Window"></i>
                            <span class="item-name">View Coupons</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url("/addcoupons")}}">
                            <i class="nav-icon i-Add"></i>
                            <span class="item-name">Add Coupons</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url("/bankoffers")}}">
                            <i class="nav-icon i-Full-View-Window"></i>
                            <span class="item-name">View Bank offers</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url("/addbankoffers")}}">
                            <i class="nav-icon i-Add"></i>
                            <span class="item-name">Add Bank offers</span>
                        </a>
                    </li>
                </ul>
                
                <ul class="childNav" data-parent="notifications">
                    <li class="nav-item">
                        <a href="dashboard.v1.html">
                            <i class="nav-icon i-Mail-3"></i>
                            <span class="item-name">Send notification by FCM</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v2.html">
                            <i class="nav-icon i-Mail-3"></i>
                            <span class="item-name">Send notification by Email</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v2.html">
                            <i class="nav-icon i-Mail-3"></i>
                            <span class="item-name">Send Notification by WhatsApp</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v2.html">
                            <i class="nav-icon i-Mail-3"></i>
                            <span class="item-name">Send Notification by SMS</span>
                        </a>
                    </li>
                </ul>
                
                <ul class="childNav" data-parent="banners">
                    <li class="nav-item">
                        <a href="{{url('view/banners')}}">
                            <i class="nav-icon i-Full-View-Window"></i>
                            <span class="item-name">List Banner</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('create/banners')}}">
                            <i class="nav-icon i-Add"></i>
                            <span class="item-name">Create Banner</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('category/banners')}}">
                            <i class="nav-icon i-Add"></i>
                            <span class="item-name">Banner Category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('location/banners')}}">
                            <i class="nav-icon i-Add"></i>
                            <span class="item-name">Banner Location</span>
                        </a>
                    </li>
                </ul>
                
                <ul class="childNav" data-parent="system">
                    <li class="nav-item">
                        <a href="dashboard.v1.html">
                            <i class="nav-icon i-Full-View-Window"></i>
                            <span class="item-name">Vendor Type</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v2.html">
                            <i class="nav-icon i-Add"></i>
                            <span class="item-name">Product Fields</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v2.html">
                            <i class="nav-icon i-Optimization"></i>
                            <span class="item-name">Vendor Categories</span>
                        </a>
                    </li>
                </ul>
                
                <ul class="childNav" data-parent="featured_vendor_plans">
                    <li class="nav-item">
                        <a href="dashboard.v1.html">
                            <i class="nav-icon i-Full-View-Window"></i>
                            <span class="item-name">View Plans</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v2.html">
                            <i class="nav-icon i-Add"></i>
                            <span class="item-name">Add Plan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v3.html">
                            <i class="nav-icon i-Optimization"></i>
                            <span class="item-name">Upgrade Requests</span>
                        </a>
                    </li>
                </ul>
                


                <ul class="childNav" data-parent="sponsored_vendor_plans">
                    <li class="nav-item">
                        <a href="dashboard.v1.html">
                            <i class="nav-icon i-Full-View-Window"></i>
                            <span class="item-name">View Plans</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v2.html">
                            <i class="nav-icon i-Add"></i>
                            <span class="item-name">Add Plan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v3.html">
                            <i class="nav-icon i-Optimization"></i>
                            <span class="item-name">Upgrade Requests</span>
                        </a>
                    </li>
                </ul>
                



                <!-- Submenu Dashboards -->
{{--                 
                <ul class="childNav" data-parent="apps">
                    <li class="nav-item">
                        <a href="invoice.html">
                            <i class="nav-icon i-Add-File"></i>
                            <span class="item-name">Invoice</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="inbox.html">
                            <i class="nav-icon i-Email"></i>
                            <span class="item-name">Inbox</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="chat.html">
                            <i class="nav-icon i-Speach-Bubble-3"></i>
                            <span class="item-name">Chat</span>
                        </a>
                    </li>
                </ul>
                <ul class="childNav" data-parent="extrakits">
                    <li class="nav-item">
                        <a href="image.cropper.html">
                            <i class="nav-icon i-Crop-2"></i>
                            <span class="item-name">Image Cropper</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="loaders.html">
                            <i class="nav-icon i-Loading-3"></i>
                            <span class="item-name">Loaders</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="ladda.button.html">
                            <i class="nav-icon i-Loading-2"></i>
                            <span class="item-name">Ladda Buttons</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="toastr.html">
                            <i class="nav-icon i-Bell"></i>
                            <span class="item-name">Toastr</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="sweet.alerts.html">
                            <i class="nav-icon i-Approved-Window"></i>
                            <span class="item-name">Sweet Alerts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tour.html">
                            <i class="nav-icon i-Plane"></i>
                            <span class="item-name">User Tour</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="upload.html">
                            <i class="nav-icon i-Data-Upload"></i>
                            <span class="item-name">Upload</span>
                        </a>
                    </li>
                </ul>
                <ul class="childNav" data-parent="uikits">
                    <li class="nav-item">
                        <a href="alerts.html">
                            <i class="nav-icon i-Bell1"></i>
                            <span class="item-name">Alerts</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown-sidemenu">
                        <a href="accordion.html">
                            <i class="nav-icon i-Split-Horizontal-2-Window"></i>
                            <span class="item-name">Accordion</span>
                            <i class="dd-arrow i-Arrow-Down"></i>
                        </a>
                        <ul class="submenu">
                            <li><a href="">Sub menu item 1</a></li>
                            <li><a href="">Sub menu item 1</a></li>
                            <li><a href="">Sub menu item 1</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown-sidemenu">
                        <a href="badges.html">
                            <i class="nav-icon i-Medal-2"></i>
                            <span class="item-name">Badges</span>
                            <i class="dd-arrow i-Arrow-Down"></i>
                        </a>
                        <ul class="submenu">
                            <li><a href="">Sub menu item 1</a></li>
                            <li><a href="">Sub menu item 1</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="buttons.html">
                            <i class="nav-icon i-Cursor-Click"></i>
                            <span class="item-name">Buttons</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="cards.html">
                            <i class="nav-icon i-Line-Chart-2"></i>
                            <span class="item-name">Cards</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="card.metrics.html">
                            <i class="nav-icon i-ID-Card"></i>
                            <span class="item-name">Card Metrics</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="carousel.html">
                            <i class="nav-icon i-Video-Photographer"></i>
                            <span class="item-name">Carousels</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="lists.html">
                            <i class="nav-icon i-Belt-3"></i>
                            <span class="item-name">Lists</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pagination.html">
                            <i class="nav-icon i-Arrow-Next"></i>
                            <span class="item-name">Paginations</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="popover.html">
                            <i class="nav-icon i-Speach-Bubble-2"></i>
                            <span class="item-name">Popover</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="progressbar.html">
                            <i class="nav-icon i-Loading"></i>
                            <span class="item-name">Progressbar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tables.html">
                            <i class="nav-icon i-File-Horizontal-Text"></i>
                            <span class="item-name">Tables</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tabs.html">
                            <i class="nav-icon i-New-Tab"></i>
                            <span class="item-name">Tabs</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tooltip.html">
                            <i class="nav-icon i-Speach-Bubble-8"></i>
                            <span class="item-name">Tooltip</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="modals.html">
                            <i class="nav-icon i-Duplicate-Window"></i>
                            <span class="item-name">Modals</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="nouislider.html">
                            <i class="nav-icon i-Width-Window"></i>
                            <span class="item-name">Sliders</span>
                        </a>
                    </li>
                </ul>
                <ul class="childNav" data-parent="sessions">
                    <li class="nav-item">
                        <a href="signin.html">
                            <i class="nav-icon i-Checked-User"></i>
                            <span class="item-name">Sign in</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="signup.html">
                            <i class="nav-icon i-Add-User"></i>
                            <span class="item-name">Sign up</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="forgot.html">
                            <i class="nav-icon i-Find-User"></i>
                            <span class="item-name">Forgot</span>
                        </a>
                    </li>
                </ul>
                <ul class="childNav" data-parent="others">
                    <li class="nav-item">
                        <a href="not.found.html">
                            <i class="nav-icon i-Error-404-Window"></i>
                            <span class="item-name">Not Found</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="user.profile.html">
                            <i class="nav-icon i-Male"></i>
                            <span class="item-name">User Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="blank.html" class="open">
                            <i class="nav-icon i-File-Horizontal"></i>
                            <span class="item-name">Blank Page</span>
                        </a>
                    </li>
                </ul> --}}
            </div>