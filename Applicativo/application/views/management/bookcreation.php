<div class="container mt-5">
    <h2 class="text-center mb-4">Create Book</h2>
    <form method="post" action="<?php echo URL ?>usercreation/create">
        <div class="form-group mb-4">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
        </div>
        <div class="form-group mb-4">
            <label for="summary">Summary:</label>
            <input type="text" class="form-control" id="summary" placeholder="Enter summary" name="summary">
        </div>
        <div class="form-group mb-4">
            <label for="release-year">Release year:</label>
            <input type="text" class="form-control" id="release-year" placeholder="Enter release year" name="release-year">
        </div>
        <div class="form-group mb-4">
            <label for="isbn">ISBN:</label>
            <input type="text" class="form-control" id="isbn" placeholder="Enter ISBN" name="isbn">
        </div>
        <div class="form-group mb-4">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price">
        </div>
        <div class="form-group mb-4">
            <label for="copies">Copies:</label>
            <input type="number" class="form-control" id="copies" placeholder="Enter Copies" name="copies">
        </div>
        <div class="form-group mb-4">
            <div class="input-group">
                <div class="custom-file">
                    <label for="cover-image">Cover Image:</label>
                    <input type="file" class="custom-file-input" id="cover-image" accept=".png, .jpg, .jpeg" name="cover-image">
                </div>
            </div>
        </div>
        <div class="form-group mb-4">
            <label for="authors">Select an option:</label>
            <select class="form-control" id="authors" name="authors">
                <option value="option1">Create New...</option>
                <?php foreach ($authors as $a):?>
                    <option value="<?php echo $a->name?>"><?php echo $a->name?></option>
                <?php endforeach;?>
            </select>
        </div>  
        <div class="text-center">
            <?php if(isset($error)): ?>
                <p class="text-danger"><?php echo $error?></p>
            <?php endif; ?>
            <?php if(isset($created)): ?>
                <p class="text-success"><?php echo $created?></p>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary">Create Book</button>
        </div>
    </form>
</div>

<?php
