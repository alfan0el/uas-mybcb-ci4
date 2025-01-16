<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBCB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('css/loginStyle.css') ?>" />
</head>
<body>
    <!-- Navbar -->
     <nav class="navbar navbar-light">
        <div class="container-fluid px-5">
            <a class="navbar-brand fs-3" href="/login"><i class="mybcb">MyBCB</i></a>

            <div class="d-flex">
                <a class="login mx-4 text-decoration-none" href="/login" id="login">Login</a>
                <a class="signup mx-4 text-decoration-none" href="/signup" id="signup">Sign Up</a>
            </div>
        </div>
     </nav>

     <?= $this->renderSection('ViewAuth') ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script>
        const currentUrl = window.location.pathname;

        if (currentUrl === '/login') {
            document.getElementById('login').classList.add('active');
        } else if (currentUrl === '/signup') {
            document.getElementById('signup').classList.add('active');
        }
    </script>
</body>
</html>
