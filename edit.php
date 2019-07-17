<?php include 'inc/header.php'; ?>
<div class="container-fluid row">
    <div class="col-sm-8">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name  =  mysqli_real_escape_string($db->link, $_POST['name']);
            $author  =  mysqli_real_escape_string($db->link, $_POST['author']);
            $details  =  mysqli_real_escape_string($db->link, $_POST['details']);
            $url  =  mysqli_real_escape_string($db->link, $_POST['url']);

            $id = $_GET['id'];
            $query = "UPDATE books
                SET
                name = '$name',
                author = '$author',
                details   = '$details',
                url   = '$url'
                WHERE id = '$id'";
            $update = $db->update($query);
            if ($update) {
                echo '<div class="alert alert-success" role="alert">Updated SuccessFully !!</div>';
            }
        }
        ?>

        <?php
        $id = $_GET['id'];
        $query = "select * from books where id='$id'";
        $book = $db->select($query);
        if ($book) {
            while ($result = $book->fetch_assoc()) {
                ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $result['name']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" name="author" id="author" value="<?php echo $result['author']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="details">Details</label>
                        <textarea name="details" id="details" name="details" class="form-control" placeholder="Tell Us About This Book" required><?php echo $result['details']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" class="form-control" name="url" id="url" value="<?php echo $result['url']; ?>" required>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            <?php
            }
        } ?>
    </div>
</div>
<?php include 'inc/footer.php'; ?>