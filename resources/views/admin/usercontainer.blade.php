<div class="container">
    <div class="row">
        <div class="col-9 my-3">
            <h3 class="font-weight-thin">User Management</h3>
        </div>
        <div class="col-3 my-3 text-right">
            <div class="row">
                <div class="col-12 px-3 pt-3">
                    <input type="text" name="" id="" class="form-control" placeholder="Search">
                </div>
            </div>
        </div>
    </div>
    <ul class="nav nav-tabs" id="myTab" style="">
        <li class="nav-item">
            <a href="#adminuser" class="nav-link active" data-toggle="tab" style="border: 0!important">Admin User</a>
        </li>
        <li class="nav-item">
            <a href="#appuser" class="nav-link" data-toggle="tab" style="border: 0!important">App User</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade active show" id="adminuser">
            @php
                switch (Route::current()->getName()) {
                    case 'admin/user':
                        $view = 'admin.adminuser';
                        break;
                    case 'admin/user/edit': 
                    case 'admin/user/create': 
                        $view = 'admin.edit';
                        break;
                }
            @endphp
            @include($view) 
        </div>
        <div class="tab-pane fade" id="appuser">
            @include('admin.users') 
        </div>
    </div>
</div>