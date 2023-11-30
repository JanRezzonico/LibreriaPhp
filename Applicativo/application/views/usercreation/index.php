<div class="container mt-5">
    <h2 class="text-center mb-4">Create User</h2>
    <form method="post" action="<?php echo URL ?>usercreation/create">
        <div class="form-group mb-4">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
        </div>
        <div class="form-group mb-4">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
        </div>
        <div class="form-group mb-4">
            <label for="password-conf">Confirm Password:</label>
            <input type="password" class="form-control" id="password-conf" placeholder="Confirm password" name="password-conf">
        </div>
        <div class="text-center">
            <div class="form-group mb-4">
                <label for="admin-flag">Admin:</label>
                <input type="checkbox" class="form-check-input" id="admin-flag" name="admin-flag">
            </div>
            <br>
            <?php if(isset($error)): ?>
                <p class="text-danger"><?php echo $error?></p>
            <?php endif; ?>
            <?php if(isset($created)): ?>
                <p class="text-success"><?php echo $created?></p>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary">Create User</button>
        </div>
    </form>
</div>

