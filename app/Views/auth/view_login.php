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
                            Login to <br />
                            <span class="mybcb"><i><b>MyBCB</b></i></span>
                            Platform
                        </h1>
                        <div class="fs-5">
                            <p style="color: hsl(217, 10%, 50.8%)">
                                If you don't have an account you can <a href="/signup" class="registerHere text-decoration-none">Register here</a>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="">
                            <div class="py-5 px-md-5">
                                <h1 class="mb-4">Login</h1>
                                <?php if (session()->getFlashdata('msg')) : ?>
                                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                                <?php endif; ?>
                                <form action="/login/auth" method="post">
                                    <!-- username input -->
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="username" name="username" id="usernameInput" class="form-control" style="border: 2px solid #FF6500;" placeholder="username"/>
                                    </div>

                                    <!-- Password input -->
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" name="password" id="passwordInput" class="form-control" style="border: 2px solid #FF6500;" placeholder="password"/>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-block mb-4">
                                    Login
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