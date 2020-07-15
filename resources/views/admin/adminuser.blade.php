
<div class="row">
    <div class="col-12 text-right py-3">
        <span class="btn-create-user">Create New User</span>
    </div>
</div>
<div class="row">
    @foreach ($admins as $admin)
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mt-1">
                            <h5 class="card-title">{{ $admin->name }}</h5>
                        </div>
                        <div class="col-md-4 text-right">
                            <i class="fa fa-edit btn-create-user"></i>&nbsp;
                            <i class="fa fa-times"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <span>Email: {{ $admin->email }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>                
    @endforeach
</div>
<div class="footer">
    @if (count($admins) > 0)
        {{ $admins->links() }}                
    @endif
</div>