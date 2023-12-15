<div class="container mt-5">
    <h2 class="text-center mb-4">Create Book</h2>
    <form method="post" action="<?php echo URL ?>management/createbook" enctype="multipart/form-data">
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
            <input type="number" class="form-control" id="release-year" placeholder="Enter release year" name="release-year">
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
            <label for="authors">Select an author:</label>
            <select class="form-control" id="authors" name="authors" onchange="checkItemSelectedAuthors()">
                <option value="-1">Create New...</option>
                <?php foreach ($authors as $a):?>
                    <option value="<?php echo $a->getId()?>"><?php echo $a->getFullName()?></option>
                <?php endforeach;?>
            </select>
            <div class="container" id="create-authors-form">
                <div class="row">
                    <div class="col">
                        <label for="author-name">Name:</label>
                        <input type="text" class="form-control" id="author-name" placeholder="Enter author name" name="author-name">
                    </div>
                    <div class="col">
                        <label for="author-surname">Surname:</label>
                        <input type="text" class="form-control" id="author-surname" placeholder="Enter author surname" name="author-surname">
                    </div>
                    <div class="col">
                        <label for="author-year">Birth year:</label>
                        <input type="number" class="form-control" id="author-year" placeholder="Enter author birth year" name="author-year">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group mb-4">
            <label for="publishers">Select a publisher:</label>
            <select class="form-control" id="publishers" name="publishers" onchange="checkItemSelectedPublishers()">
                <option value="-1">Create New...</option>
                <?php foreach ($publisher as $p):?>
                    <option value="<?php echo $p->getId()?>"><?php echo $p->getName()?></option>
                <?php endforeach;?>
            </select>
            <div class="container" id="create-publisher-form">
                <div class="row">
                    <div class="col">
                        <label for="publisher-name">Name:</label>
                        <input type="text" class="form-control" id="publisher-name" placeholder="Enter publisher name" name="publisher-name">
                    </div>
                    <div class="col">
                        <label for="publisher-country">Country:</label>
                        <input type="text" class="form-control" id="publisher-country" placeholder="Enter publisher country" name="publisher-country">
                    </div>
                    <div class="col">
                        <label for="publisher-year">Foundation year:</label>
                        <input type="number" class="form-control" id="publisher-year" placeholder="Enter publisher foundation year" name="publisher-year">

                    </div>
                </div>
            </div>
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
<script>
    checkItemSelectedAuthors();
    checkItemSelectedPublishers()

    function checkItemSelectedAuthors(){
        var selectAuthors = document.getElementById("authors");
        var createAuthorsForm = document.getElementById("create-authors-form");
        var authorNameInput = document.getElementById("author-name");
        var authorSurnameInput = document.getElementById("author-surname");
        var authorYearInput = document.getElementById("author-year");

        if(selectAuthors.value == -1){
            createAuthorsForm.style.display = "block";
        }else{
            createAuthorsForm.style.display = "none";
            authorNameInput.value = null;
            authorSurnameInput.value = null;
            authorYearInput.value = null;
        }
    }

    function checkItemSelectedPublishers(){
        var selectPublishers = document.getElementById("publishers");
        var createPublishersForm = document.getElementById("create-publisher-form");
        var publisherNameInput = document.getElementById("publisher-name");
        var publisherCountryInput = document.getElementById("publisher-country");
        var publisherYearInput = document.getElementById("publisher-year");

        if(selectPublishers.value == -1){
            createPublishersForm.style.display = "block";
        }else{
            createPublishersForm.style.display = "none";
            publisherNameInput.value = null;
            publisherCountryInput.value = null;
            publisherYearInput.value = null;
        }
    }
</script>
<?php
