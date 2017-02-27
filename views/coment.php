<div class="coment">
    <form class="contact_form" name="comment" method="post" action="add_coments">

        <ul>
            <li>
                <h2>Залишити Коментар</h2>
                <span class="required_notification">* Всі поля повинні бути заповнені</span>
            </li>
            <li>
                <label for="name">Name</label>
                <input id="name" type="text" name="name" placeholder="Имя " maxlength="60" required>
            </li>
            <li>
                <label for="mail">Email</label>
                <input id="mail" type="text" name="mail" placeholder="Пошта" maxlength="60" required >
            </li>
            <li>
                <label for="text">Text</label>
                <textarea id="text" placeholder="Текст" name="text" cols="40" rows="6" required></textarea>
            </li>
            <li>
                <button class="submit" type="submit">Відправити</button>
            </li>
        </ul>
        <input type="hidden" value="<?php echo $my_article['id'];?>" name="id_artile" >
        <input type="hidden" value="<?php echo $my_article['content_full_slug'];?>" name="slug_artile" >
    </form>
</div>
