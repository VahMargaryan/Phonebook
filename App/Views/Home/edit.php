<div class="signup-form">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-xs-4">First Name</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="fname">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-4">Last Name</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="lname">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-4">Email Adress</label>
            <div class="col-xs-8">
                <input type="email" class="form-control" name="mail">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-4">Phone Number</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="num">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-8 col-xs-offset-4">
                <input type="submit" name="edituser" class="btn btn-primary btn-lg" value="Edit User">
            </div>
        </div>
    </form>
</div>

