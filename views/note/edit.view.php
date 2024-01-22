<?php
require view('partials/Header.php');
?>

<div class="grid place-items-center">
    <div class="drop-shadow-lg w-96 h-96">
        <h1 class='text-3xl font-extrabold w-96'>Create My Notes</h1>
        <form action="/note" method="post">
            <input type="hidden" name="_method" value='patch'>
            <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <div class="mt-5">
                <label for="title" class="text-black">Title</label>
                <input id="title" name="title" class="w-96 text-black font-bold ps-2 h-10 border border-b-2" type="text" value="<?= isset($post['title']) ? $post['title'] : ' '; ?>">
                <?php if(isset($error)): ?>
                    <p class="text-red-500 text-xs"><?= $error ?></p>
                <?php endif; ?>
            </div>
            <div class="mt-3 flex gap-x-2">
                <a class="ms-3 bg-gray-500 text-white text-xs py-1 px-2 rounded-lg" href="/notes">
                    cancel
                </a>
                <button class="bg-black text-white py-1 px-2 rounded-md" type="submit">update</button>
            </div>
        </form>
    </div>
</div>

<?php
require view('partials/Footer.php');
?>