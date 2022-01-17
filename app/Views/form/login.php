<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <title>
                Login | MyWebsite
            </title>
            <link href="/css/login.css" rel="stylesheet">
            </link>
        </meta>
    </head>
    <body>
        <div class="container">
            <form action="/pages/login" method="POST">
                <?= csrf_field(); ?>
                <h1>
                    Login
                </h1>
                <div class="line">
                </div>
                <div class="username">
                    <label for="username">
                        Username
                    </label>
                    <input id="username" name="username" type="text">
                    </input>
                    <?php if(session()->getFlashdata('eroru')) : ?>
                        <div class="text-field-error">
                            <?= session()->getFlashdata('eroru'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="password">
                    <label for="password">
                        Password
                    </label>
                    <input id="password" name="password" type="password">
                    </input>
                    <?php if(session()->getFlashdata('erorp')) : ?>
                        <div class="text-field-error">
                            <?= session()->getFlashdata('erorp'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="button">
                    <button type="submit">
                        Login
                    </button>
                    <span>
                        dont haven't account?
                        <a href="/pages/register">
                            Register here
                        </a>
                    </span>
                </div>
            </form>
        </div>
    </body>
</html>