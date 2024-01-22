<?php
require view('partials/Header.php');
?>

<div class="grid place-items-center">
    <h1 class='text-3xl font-extrabold'>My Note</h1>
    <p><?php $_SESSION['user'] ?></p>
    <div class="flex">
            <p>
            <?php 
            echo htmlspecialchars($post['title'])
                // echo $post;
             ?>
            </p>
            <form action="/note" method="post">
                <input type="hidden" name="_method" value="delete"/>
                <input type="hidden" name="id" value="<?= $post['id'] ?>">
                <a class="ms-3 bg-gray-500 text-white text-xs py-1 px-2 rounded-lg" href="/edit/note?id=<?= $post['id'] ?>">
                    Edit
                </a>
                <button class="ms-3 bg-red-500 text-white text-xs py-1 px-2 rounded-lg">delete</button>
            </form>
    </div>

    <div class="w-20 h-10 text-center pt-2 rounded-lg bg-black text-white">
        <a href="/notes"> back</a>
    </div>
</div>


<?php
require view('partials/Footer.php');
?>