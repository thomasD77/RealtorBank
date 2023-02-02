@extends('layout')

@section('content')
    <div class="col-lg-7 col-md-6 col-xs-6 pl-3 offset-lg-1 offset-md-3">
        <div class="my-address">
            <h3 class="heading pt-0">Change Password</h3>
            <form>
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="form-group name">
                            <label>Current Password</label>
                            <input type="password" name="current-password" class="form-control" placeholder="Current Password">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group email">
                            <label>New Password</label>
                            <input type="password" name="new-password" class="form-control" placeholder="New Password">
                        </div>
                    </div>
                    <div class="col-lg-12 ">
                        <div class="form-group subject">
                            <label>Confirm New Password</label>
                            <input type="password" name="confirm-new-password" class="form-control" placeholder="Confirm New Password">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="send-btn mt-2">
                            <button type="submit" class="btn btn-common">Send Changes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection



