SIGN UP

<form method="post" action="/user/signup">

    <input name="login" type="text"
         value="<?=isset($_SESSION['form_data']['login']) ? h($_SESSION['form_data']['login']) : '' ; ?>"
    >Login: <br>

    <input name="password" type="password">Password: <br>

    <input name="name" type="text"
        value="<?=isset($_SESSION['form_data']['name']) ? h($_SESSION['form_data']['name']) : '' ; ?>"
    >Name: <br>

    <input name="email" type="text"
        value="<?=isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : '' ; ?>"
    >Email: <br>
    <br>
    <input type="submit" name="register">
    <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
</form>