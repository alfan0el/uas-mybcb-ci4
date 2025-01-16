<?= $this->extend('auth/layout/index'); ?>
<?= $this->section('ViewAuth'); ?>
<div class="container">
    <section class="">
        <!-- Jumbotron -->
        <div class="px-4 py-5 px-md-5 text-center text-lg-start">
            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h1 class="my-3 display-4 ls-tight">
                            Sign Up to<br />
                            <span class="mybcb"><i><b>MyBCB</b></i></span>
                            Platform
                        </h1>
                        <div class="fs-5">
                            <p style="color: hsl(217, 10%, 50.8%)">
                                If you already registered you can <a href="/login" class="loginHere text-decoration-none">Login here</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="">
                            <div class="py-5 px-md-5">
                                <h1 class="mb-4">Sign Up</h1>
                                <?php if(isset($validation)) : ?>
                                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                                <?php endif; ?>
                                <form action="/signup/auth" method="POST">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <input type="text" name="nama_lengkap" id="namalengkapInput" class="form-control" style="border: 2px solid #FF6500;" placeholder="Nama Lengkap"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <input type="email" name="email" id="emailInput" class="form-control" style="border: 2px solid #FF6500;" placeholder="Email"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <input type="username" name="username" id="usernameInput" class="form-control" style="border: 2px solid #FF6500;" placeholder="Username"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <input type="password" name="password" id="passwordInput" class="form-control" style="border: 2px solid #FF6500;" placeholder="Password"/>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Submit button -->
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-block mb-4">
                                    Sign up
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->
</div>
<?= $this->endSection() ?>