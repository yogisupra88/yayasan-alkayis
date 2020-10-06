<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Yayasan Alkayis | LOGIN</title>
    <link rel="stylesheet" href="<?= base_url('dashboard') ?>/login/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<style>
.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
</style>
</head>

<body>
    <div class="bg-img">
        <div class="content">
            <img src="<?= base_url('images') ?>/foto/alkayis.jpg" width="150" style="margin-top: -30px;">
            <header>Login</header>
            <?php if ($this->session->flashdata('pesan')) { ?>
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <strong> <?= $this->session->flashdata('pesan') ?> </strong>.
            </div>
            <?php } ?>

            <form action="<?= base_url('auth'); ?>" method="post">
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input type="text" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
                    <small class="text-light"> <?= form_error('username'); ?></small>

                </div>
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" class="pass-key" name="password" placeholder="Password">
                    <span class="show">SHOW</span>
                </div>
                <div class="pass">

                </div>
                <div class="field">
                    <input type="submit" value="LOGIN">
                </div>
            </form>
        </div>
    </div>

    <script>
    const pass_field = document.querySelector('.pass-key');
    const showBtn = document.querySelector('.show');
    showBtn.addEventListener('click', function() {
        if (pass_field.type === "password") {
            pass_field.type = "text";
            showBtn.textContent = "HIDE";
            showBtn.style.color = "#3498db";
        } else {
            pass_field.type = "password";
            showBtn.textContent = "SHOW";
            showBtn.style.color = "#222";
        }
    });
    </script>


</body>

</html>