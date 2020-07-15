<div class="row">
    <div class="col-12 text-right py-3">
        &nbsp;
    </div>
</div>
<div class="row">
    @foreach ($users as $user)
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mt-1">
                            <h5 class="card-title">{{ $user->name }}</h5>
                        </div>
                        <div class="col-md-4 text-right">
                            <i class="fa fa-edit"></i></>&nbsp;
                            <i class="fa fa-times"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <span>Email: {{ $user->email }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>                
    @endforeach
</div>
<div class="footer">
    @if (count($users) > 0)
        {{ $users->links() }}                
    @endif
</div>