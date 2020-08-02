<!--register-starts-->
<div class="register">
    <div class="container">
        <div class="register-top heading">
            <h2>REGISTER</h2>
        </div>
        <div class="register-main">
            <div class="col-md-6 account-left">
                <form action="user/signup" method="post" id="signup" role="form" data-toggle="validator">
                    <div class="form-group has-feedback">
                        <label for="login">Login</label>
                        <input type="text" name="login"  class="form-control" id="login"
                               placeholder="Login" value="<?=isset($_SESSION['form_data']['login'])
                            ? h($_SESSION['form_data']['login']) : '' ;?>" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="password">Password</label>
                        <input type="password" name="password" data-error="Пароль должен быть не короче 6 символов"
                              data-minlength="6" class="form-control" id="password" placeholder="password" value=
                               "<?=isset($_SESSION['form_data']['password']) ? h($_SESSION['form_data']['password']) : '' ;?>" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Name" value=
                        "<?=isset($_SESSION['form_data']['name']) ? h($_SESSION['form_data']['name']) : '' ;?>" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value=
                        "<?=isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : '' ;?>" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Address" value=
                        "<?=isset($_SESSION['form_data']['address']) ? h($_SESSION['form_data']['address']) : '' ;?>" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <button type="submit" class="btn btn-default" >Зарегистрировать</button>
                </form>
                <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
            </div>
        </div>
    </div>
</div>
<!--register-end-->
