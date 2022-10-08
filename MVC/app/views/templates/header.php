<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman <?= $data['judul']; ?> </title>
    <link rel="stylesheet" href= "<?= BASEURL; ?>/css/bootstrap.css"?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>


<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= BASEURL; ?>">MVC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL; ?>/about/index.php">About</a>
                </li>
            </ul>
            </div>
        </div>
    </div>
</nav>