

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Intranusa</title>

    <!-- css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- js bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- css -->
    <link rel="stylesheet" href="assets/admin.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg p-3 navbar-dark bg-dark">
            <div class="container ">
                <a class="navbar-brand" href="#">Admin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Services
                            </a>
                            <ul class="nav dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="cctv.php">CCTV</a></li>
                                <li><a class="dropdown-item" href="panel.php">Solar Panel</a></li>
                                <li><a class="dropdown-item" href="it.php">It Solution</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="portofolio.php">Portofolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sosmed.php">Sosmed</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="components/logout.php">Logout >></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>