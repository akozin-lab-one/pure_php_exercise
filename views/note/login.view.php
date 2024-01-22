<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="grid place-items-center h-screen">
    <div class="mb-0">
        <?php if(isset($_SESSION['_flashed']['error'])): ?>
            <p class="text-red-500 text-xs text-3xl"><?= isset($_SESSION['_flashed']['error']['email']) ? $_SESSION['_flashed']['error']['email'] : (isset($_SESSION['_flashed']['error']['password']) ? $_SESSION['_flashed']['error']['password'] : '') ?></p>
        <?php endif; ?>
    </div>
     
    <div class="bg-gray-400 text-white w-96 h-60">
        <h3 class="text-center font-bold uppercase my-3">Login Here</h3>
        <form action="/login" method="post">
        <div class="mx-auto w-52 ">
            <input class="mb-2 w-52 ps-2 py-1 rounded text-black text-base" type="text" name="email" id="" value="<?= old('email') ?? ''; ?>">
            <br>
            <input class="mb-2 w-52 ps-2 py-1 rounded text-black text-base" type="password" name="password">
        </div>

        <div class="w-52 mx-auto flex justify-between">
            <button class="border border-white px-3 text-sm py-1 rounded-md" type="submit">Login</button>
            <a href="/registerPage">register</a>
        </div>
        </form>
    </div>

</div>    
</body>
</html>