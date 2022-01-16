<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <title>
                Register | MyWebsite
            </title>
            <link href="/css/register.css" rel="stylesheet">
            </link>
        </meta>
    </head>
    <body>
        <div class="container">
            <form action="/pages/createUser" method="POST">
                <?= csrf_field(); ?>
                <h1>
                    Register
                </h1>
                <div class="line">
                </div>
                
                <div class="text-field">
                    <label for="username">
                        Username
                    </label>
                    <input id="username" name="username" type="text" value="<?= old('username'); ?>" autofocus>
                    </input>
                    <div class="text-field-error">
                        <?= $validation->getError('username'); ?>
                    </div>
                </div>

                <div class="text-field">
                    <label for="nama">
                        Nama
                    </label>
                    <input id="nama" name="nama" type="text" value="<?= old('nama'); ?>">
                    </input>
                    <div class="text-field-error">
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>
                
                <div class="text-field">
                    <label for="password">
                        Password
                    </label><br>
                    <input id="password" name="password" type="password">
                    </input>
                    <?php if(session()->getFlashdata('eror')) : ?>
                        <div class="text-field-error">
                            <?= session()->getFlashdata('eror'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="text-field-error">
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>

                <div class="text-field">
                    <label for="c-password">
                        Confirm Password
                    </label><br>
                    <input id="c-password" name="c-password" type="password">
                    </input>
                    <div class="text-field-error">
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>
                <div class="button">
                    <button type="submit">
                        Login
                    </button>
                    <span>
                        haven't account?
                        <a href="/">
                            Login here
                        </a>
                    </span>
                </div>
            </form>
        </div>
    </body>
</html>