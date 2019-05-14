<div class="signup-form">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-xs-4">First Name</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="fname" value="<?PHP echo $data['firstname'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-4">Last Name</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="lname" value="<?PHP echo $data['lastname'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-4">Email Address</label>
            <div class="col-xs-8">
                <input type="email" class="form-control" name="mail" value="<?PHP echo $data['mail'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-4">Phone Number</label>
            <span id="plus">
                <i class="fas fa-plus-circle plus"></i>
            </span>
            <div id="phone" class="col-xs-8">
                <?php
                $num = explode(",", $data['c']);
                foreach ($num as $number) {
                    echo '<input name="number[]" type="text" class="mt-4 form-control" value="' . $number . '">';
                }
                ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-8 col-xs-offset-4">
                <input type="submit" name="edituser" class="btn btn-primary btn-lg" value="Edit Contact">
            </div>
        </div>
    </form>
</div>
<script>
    (function () {
        var span = document.getElementById('plus');
        var div = document.getElementById('phone');
        var count = 0;
        var addInpPhoneNum = function () {
            count++;
            var input = document.createElement("input");
            input.id = 'inputId' + count;
            input.type = 'text';
            input.class = 'form-control';
            input.name = 'number[]';
            input.setAttribute('class', 'form-control numbers mt-3');
            input.setAttribute('maxlength', '20');
            input.placeholder = 'Number' + count;
            div.appendChild(input);
        };
        span.addEventListener('click', function () {
            addInpPhoneNum();
        }.bind(this));
    })();
</script>

