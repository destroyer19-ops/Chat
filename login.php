<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>

<body class="bg-body-secondary">
    <section class="container bg-light my-5 w-75 p-4 border rounded shadow-lg login">
        <form>
            <div class="error-txt bg-danger-subtle py-2 px-auto text-danger-emphasis text-center mb-2 rounded d-none">
            </div>


            <div class="mb-3 form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Email</label>
            </div>


            <div class="mb-3 form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
                <!-- <a class="show-hide">

                    <i class="fas fa-eye"></i>
                </a> -->
            </div>
            <i style="top: 50%; right: 20%; transform: translateY(-50%); cursor: pointer; color: #6c757d;"
                class="fas fa-eye position-absolute" id="togglePassword"></i>


            <div class="mb-3 button">
                <input type="button" class="btn btn-dark form-control" value="Continue to chat">
            </div>
            <div>
                Not yet signed up? <a href="index.php">Signup Now</a>
            </div>
        </form>
    </section>

    <main></main>

    <footer></footer>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>