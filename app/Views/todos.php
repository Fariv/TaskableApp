<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Todo App</title>
  </head>
  <body>
    <main>
        <header class="py-2 mb-4 border-bottom">
            <div class="container">
                <h3 class="d-flex fw-bold">Todo App</h3>
            </div>
        </header>
        <div class="container">
            <?php $flashMessage = session()->getFlashdata('successMesssage');
            $errors = session()->get('errorsMessages');
            session()->remove('errorsMessages');
            if (strlen($flashMessage) > 0) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span><?php echo $flashMessage; ?></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } ?>
            <form class="row" method="POST" action="<?php echo base_url('home/store/' . @$dataEdit['id']); ?>">
                <div class="col-10">
                    <input name="todoname" class="form-control mb-2 <?php echo !@is_null($errors['todoname']) ? 'is-invalid' : '' ?>" value="<?php echo @$dataEdit['todoname']; ?>" type="text" placeholder="Todo name">
                    <div class="invalid-feedback"><?php echo @$errors['todoname']; ?></div>
                    <textarea name="description" class="form-control mb-2 <?php echo !@is_null($errors['description']) ? 'is-invalid' : '' ?>" placeholder="Todo Description"><?php echo @$dataEdit['description']; ?></textarea>
                    <div class="invalid-feedback"><?php echo @$errors['description']; ?></div>
                </div>
                <div class="col-2">
                    <button class="btn btn-outline-primary" type="submit">
                        <?php if (!empty($dataEdit)) {
                            echo "Update Todo";
                        } else {
                            echo "Add Todo";
                        } ?>
                    </button>
                </div>
            </form>
            <?php foreach ($data as $chunk) {?>
            <div class="row mt-5">
                <?php foreach ($chunk as $todo) {?>
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $todo['todoname']; ?></h5>
                            <p class="card-text"><?php echo $todo['description']; ?></p>
                            <a href="<?php echo base_url('home/index/' . $todo['id']); ?>" class="btn btn-outline-info card-link" type="submit">Edit</a>
                            <a onclick="confirm('Are you sure to delete') ? window.location.href='<?php echo base_url('home/delete/' . $todo['id']); ?>' : ''" href="javascript:undefined;" class="btn btn-outline-danger card-link">Delete</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>