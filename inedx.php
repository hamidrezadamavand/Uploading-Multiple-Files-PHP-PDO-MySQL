<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Uploading multiple files</title>
</head>
<body>
<div class="container d-flex justify-content-center">
    <div class="row d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <h2 class="col-auto mb-5">Uploading multiple files in PHP PDO with MySQL</h2>
        <form method="post" action="uploadMultipleFiles.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="fileName" class="form-label">File Name 1 :</label>
                <input type="text" class="form-control" id="fileName" name="fileName[0]">
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" id="file" name="fileUpload[0]">
            </div>
            <hr>
            <div class="mb-3">
                <label for="fileName" class="form-label">File Name 2 :</label>
                <input type="text" class="form-control" id="fileName" name="fileName[1]">
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" id="file" name="fileUpload[1]">
            </div>
            <hr>
            <div class="mb-3">
                <label for="fileName" class="form-label">File Name 3 :</label>
                <input type="text" class="form-control" id="fileName" name="fileName[2]">
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" id="file" name="fileUpload[2]">
            </div>
            <div class="col-auto">
                <input type="submit" name="ButtonUpload" class="btn btn-primary mb-3" value="Upload">
            </div>
        </form>
        <hr>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">row</th>
                <th scope="col">File Name</th>
                <th scope="col">File Address</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include 'connection.php';
            $num=1;
            $Stmt = $conn->prepare("SELECT * FROM uploadfile");
            $Stmt->execute();
            while ($row = $Stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <th scope="row"><?= $num++; ?></th>
                    <td><?= $row['filename']; ?></td>
                    <td><?= $row['fileAddress']; ?></td>
                </tr>
                <?php
            }
            ?>

            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
</body>
</html>
