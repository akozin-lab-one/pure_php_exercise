<?php
require view('partials/Header.php');
?>

<div class="grid place-items-center">
    <h1 class='text-3xl font-extrabold'>My Notes</h1>
    <ul>
        <?php if (isset($posts)) :?>
            <?php foreach( $posts as $post) : ?>
            <div class='flex mb-3'>
            <li>
                <a class="text-green-500 hover:underline" href="/note?id=<?= $post['id'] ?>"><?php echo $post['title'] ?></a>
            </li>

            </div>
        <?php endforeach; ?>
        <?php else: ?>
            <h1 class="text-red-300">There is still no notes for this account </h1>
        <?php endif; ?>

    </ul>

    <div class="mt-4">
        <a class="bg-black text-white p-2 rounded-md hover:dropshadow-lg" href="/notes/create-notes">create note</a>
    </div>
</div>

<?php
require view('partials/Footer.php');
?>