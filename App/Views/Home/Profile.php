<div class="container mt-3 shadow p-3">
    <div>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <a href="/contacts/add" name="contacts" class="btn btn-2">
                <span class="txt">add contacts</span>
            </a>
            <a href="/user/<?php echo $data['Id'] ?>/contacts" name="contacts" class="btn btn-3">
                <span class="txt">view contacts</span>
            </a>
        </form>
    </div>
    <div class="row">
        <div class=" col-lg-offset-3 col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
                                    <img class="img-circle img-responsive"
                                         src="https://i0.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png?fit=256%2C256&quality=100&ssl=1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="centered-text col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
                                    <div>
                                        <h4 class="names"> <?php echo $data['firstName'] ?></h4>
                                        <h4 class="names"><?php echo $data['lastName'] ?></h4>
                                        <p class="number"><i class="fas fa-phone"></i> <?php echo $data['numbers'] ?>
                                        </p>
                                        <p class="number"><i class="fa fa-envelope"> </i><?php echo $data['email'] ?>
                                        </p>
                                        <a href="/user/<?php echo $data['Id'] ?>/edit" name="contacts"
                                           class="btn btn-4">
                                            <span class="txt">Edit User</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


