<?php include 'inc/header.php'; ?>
<div class="container-fluid row">
    <div class="col-sm-8">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name  =  mysqli_real_escape_string($db->link, $_POST['name']);
            $author  =  mysqli_real_escape_string($db->link, $_POST['author']);
            $details  =  mysqli_real_escape_string($db->link, $_POST['details']);
            $url  =  mysqli_real_escape_string($db->link, $_POST['url']);

            $query = "INSERT INTO books(name,author,details,url) VALUES('$name','$author','$details','$url')";
            $create = $db->insert($query);
            if ($create) {
                echo '<div class="alert alert-success" role="alert">Created SuccessFully !!</div>';
            }
        }
        ?>


        <form action="create.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Book's Name" required>
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" name="author" id="author" placeholder="Book's Author" required>
            </div>

            <div class="form-group">
                <label for="details">Details</label>
                <textarea name="details" id="details" name="details" class="form-control" placeholder="Tell Us About This Book" required></textarea>
            </div>

            <div class="form-group">
                <label for="url">Url</label>
                <input type="text" class="form-control" name="url" id="url" placeholder="Book's Url" required>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>
<?php include 'inc/footer.php'; ?>