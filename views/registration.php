<main>
    <div>
        <form action="my_reg" method="post">
            <p> <input type="text" name="login" placeholder="Введіть імя"  pattern="[A-Za-z]{3,}"> </p>
            <p> <input type="email" name="email" placeholder="Введіть email"  > </p>
            <p> <input type="password" name="pass" placeholder="Введіть пароль"  minlength="5" maxlength="20" pattern="[A-Za-z0-9]{5,}"> </p>
            <p><input type="password" name="pass_repead" placeholder="Повторіть пароль"  minlength="5" maxlength="20" pattern="[A-Za-z0-9]{5,}"> </p>
            <button>send</button>
        </form>
</div>
</main>