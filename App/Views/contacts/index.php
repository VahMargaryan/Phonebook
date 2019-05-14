<div class="container mt-3 shadow p-3">
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Phone Number(s)</th>
        <th scope="col">Email</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $info)  : ?>
        <tr>
            <td><?php echo $info['firstname'] ?></td>
            <td><?php echo $info['lastname'] ?></td>
            <td>
                <?php $e = explode(',', $info['c']);
                foreach ($e as $num) {
                    echo $num . '<br>';
                }
                ?></td>
            <td><?php echo $info['mail'] ?></td>
            <td>
                <a href="/contacts/<?php echo $info['id'] ?>/edit" class="btn btn-5">
                    <span class="txt">Edit</span>
                </a>
            </td>
            <td>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <button name="delete" type="submit" class="btn btn-6" value="<?PHP echo $info['id'] ?>">
                        <span class="txt">Delete</span>
                    </button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>


