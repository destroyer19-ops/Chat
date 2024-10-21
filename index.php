<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Document</title>
   <!-- <script src="javascript//pass-show-hide.js"></script> -->

</head>

<body class="bg-body-secondary">
    <!-- <header class="bg-body-secondary px-5">
        <div class="heading">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 login-status">
                            <li class="nav-item login">
                                <a class="nav-link active" aria-current="page" href="#">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                              <a class="nav-link" href="#">Login</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">Register</a>
                            </li>
                            Optional: Only show when user is logged in
                            <li class="nav-item">
                              <a class="nav-link" href="#">Logout</a>
                            </li>
                          </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="navigation">
            <nav class="nav nav-underline flex-wrap justify-content-center  flex-row">
                <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="#">All</a>
                <a class="flex-sm-fill text-sm-center nav-link" href="#">Men</a>
                <a class="flex-sm-fill text-sm-center nav-link" href="#">Women</a>
                <a class="flex-sm-fill text-sm-center nav-link" href="#">Accessories</a>
                <a class="flex-sm-fill text-sm-center nav-link" href="#">Boy</a>
                <a class="flex-sm-fill text-sm-center nav-link" href="#">Girl</a>

            </nav>
        </div>
    </header> -->
    <section class="container bg-light my-5 w-75 md p-4 border rounded shadow-lg signup">
        <form action="#" enctype="multipart/form-data">
            <div class="error-txt bg-danger-subtle py-2 px-auto text-danger-emphasis text-center mb-2 rounded d-none"></div>
            <div class="row g-2">
                <div class="col-md">
                    <div class="mb-3 form-floating">
                        <input type="text" name="fname" class="form-control" id="floatingInput" placeholder="John " required>
                        <label for="floatingInput">First Name</label>
                    </div>
                </div>
                <div class="col-md">

                    <div class="mb-3 form-floating">
                        <input type="text" name="lname" class="form-control" id="floatingInput" placeholder="Doe" required>
                        <label for="floatingInput">Last Name</label>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col-md">
                    <div class="mb-3 form-floating">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                            required>
                        <label for="floatingInput">Email</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="mb-3 position-relative">
                        <div class="form-floating">

                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password"
                            required>
                            <label for="floatingPassword">Password</label>
                        </div>

                            <i        style="top: 50%; right: 15px; transform: translateY(-50%); cursor: pointer; color: #6c757d;"
                                         class="fas fa-eye position-absolute" id="togglePassword"></i>
                        
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control" name="image" id="inputGroupFile02" required>
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
            <div class="mb-3 button">
                <input type="button" class="btn btn-dark form-control" value="Continue to chat">
            </div>
            <div>
                Already signed up? <a href="login.php">Login Now</a>
            </div>
        </form>
    </section>

    <main></main>

<script src="javascript/pass-show-hide.js"></script>
<script src="javascript/signup.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>