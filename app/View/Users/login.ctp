
<div class="login-form" >
    <?php echo $this->Form->create('User'); ?>
    <h3 class="form-title">Ingresa a tu cuenta</h3>
    <div class="alert alert-error hide">
        <button class="close" data-dismiss="alert"></button>
        <span>Ingresa el usuario y password</span>
    </div>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Usuario</label>
        <div class="input-icon">
            <i class="icon-user"></i>
            <?php echo $this->Form->text('username', array('class' => 'form-control placeholder-no-fix', 'placeholder' => 'Usuario')); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <div class="input-icon">
            <i class="icon-lock"></i>
            <?php echo $this->Form->password('password', array('class' => 'form-control placeholder-no-fix', 'placeholder' => 'password')); ?>
        </div>
    </div>
    <div class="form-actions">

        <button type="submit" class="btn green pull-right">
            Entrar <i class="m-icon-swapright m-icon-white"></i>
        </button>            
    </div>

</div>