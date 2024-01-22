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
    <div class="bg-gray-400 text-white w-96 h-60">
        <h3 class="text-center font-bold uppercase my-3">Register Now</h3>
        <form action="/register" method="post">
        <div class="mx-auto w-52 ">
            <input class="mb-2 w-52 ps-2 py-1 rounded text-black text-base" type="text" name="email" id="">
            <?php if(isset($_SESSION['_flashed']['error']) && isset($_SESSION['_flashed']['error']['email'])): ?>
                <p class="text-red-500 text-xs text-3xl"><?= $_SESSION['_flashed']['error']['email']; ?></p>
            <?php endif; ?>
            <br>
            <input class="mb-2 w-52 ps-2 py-1 rounded text-black text-base" type="password" name="password">
            <?php if(isset($_SESSION['_flashed']['error']) && isset($_SESSION['_flashed']['error']['password'])): ?>
                <p class="text-red-500 text-xs text-3xl"><?= $_SESSION['_flashed']['error']['password']; ?></p>
            <?php endif; ?>
        </div>

        <div class="w-52 mx-auto flex justify-between">
            <button class="border border-white px-3 text-sm py-1 rounded-md" type="submit">Register</button>
            <a href="/loginPage">login</a>
        </div>
        </form>
    </div>
</div>    
</body>
</html>