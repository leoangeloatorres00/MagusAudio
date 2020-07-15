<style>
    .round{
        border-radius: 50%; 
        height: calc(6rem + 1vw);
        width: calc(6rem + 1vw)!important;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-12 text-right py-3">
            &nbsp;
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12 text-right">
                            <a href="{{ url('admin/user') }}">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="card round text-center">
                                <div class="card-body" style="height:80px;"></div>
                            </div>
                        </div>
                    </div>
                    <h4>Personal Information</h4>
                    <div class="form-group row">
                        <div class="form-group col-4">
                            <input type="text" name="" id="" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="form-group col-4">
                            <input type="text" name="" id="" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group col-4">
                            <input type="text" name="" id="" class="form-control" placeholder="Middle Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-4">
                            <input type="text" name="" id="" class="form-control" placeholder="Birthday">
                        </div>
                        <div class="form-group col-4">
                            <input type="text" name="" id="" class="form-control" placeholder="Gender">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-12">
                            <input type="text" name="" id="" class="form-control" placeholder="Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-4">
                            <input type="text" name="" id="" class="form-control" placeholder="City">
                        </div>
                        <div class="form-group col-4">
                            <input type="text" name="" id="" class="form-control" placeholder="Country">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-4">
                            <input type="text" name="" id="" class="form-control" placeholder="Email Address">
                        </div>
                        <div class="form-group col-4">
                            <input type="text" name="" id="" class="form-control" placeholder="Mobile Number">
                        </div>
                    </div>
                    <h4>Role Management</h4>
                    <div class="form-group row">
                        <div class="form-group col-8">
                            <select class="form-control">
                                <option>Position</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-12">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check all</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">App User Management</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Audio Management</label>
                            </div>  
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Customer Support</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <button class="btn btn-primary">Create Account</button>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>