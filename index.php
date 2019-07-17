<?php include 'inc/header.php'; ?>

<div class="container-fluid row">
    <div class="col-sm-12">
        <?php
        if (isset($_GET['delete'])) {
            $id = $_GET['delete'];
            $delquery = "delete from books where id='$id'";
            $deletebook = $db->delete($delquery);
            if ($deletebook) {
                echo '<div class="alert alert-success" role="alert">Removed SuccessFully !!</div>';
            }
        }
        ?>
        <table class="table table-bordered ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Details </th>
                    <th scope="col">Url </th>
                    <th scope="col">Action </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "select * from books order by id desc ";
                $books = $db->select($query);
                if ($books) {
                    $i = 0;
                    while ($result = $books->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $result['name']; ?></td>
                            <td><?php echo $result['author']; ?></td>
                            <td><?php echo $result['details']; ?></td>
                            <td><?php echo $result['url']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $result['id']; ?>"><button type="button" class="btn btn-primary btn-xs">Edit</button></a><br><br>
                                <a href="index.php?delete=<?php echo $result['id']; ?>"><button type="button" class="btn btn-danger btn-xs">Delete</button></a>
                            </td>
                        </tr>
                    <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'inc/footer.php'; ?>