
<!--This class is used to display errors of type
    1. SignUp - If email has been used before in the database
    2. SignIn - If email and password combination is incorrect-->

<?php if(count($errors) > 0) : ?>
    <div class="error">
        <?php foreach($errors as $error) : ?>
            <p>
                <?php
                echo "<script type='text/javascript'> alert(" .json_encode($error).")</script>";
                ?>
            </p>
        <?php endforeach;?>
    </div>
<?php endif; ?>