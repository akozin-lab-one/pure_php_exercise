<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
<header class="bg-white">
  <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
    <div class="flex lg:flex-1">
      <a href="#" class="-m-1.5 p-1.5">
        <span class="sr-only">Your Company</span>
        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
      </a>
    </div>
    <div class="flex lg:hidden">
      <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
        <span class="sr-only">Open main menu</span>
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
      </button>
    </div>
    <div class="hidden lg:flex lg:gap-x-12">
    <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Home</a>
      <a href="/about" class="text-sm font-semibold leading-6 text-gray-900">About</a>
      <a href="/notes" class="text-sm font-semibold leading-6 text-gray-900">Note</a>
      <a href="/contact" class="text-sm font-semibold leading-6 text-gray-900">Contact</a>
    </div>
    <?php if ($_SESSION['user'] ?? false) : ?>
      <p class="ms-3"><?php echo $_SESSION['user']['user'] ?></p>
    <?php else: ?>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="/loginPage" class="text-sm font-semibold leading-6 text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
      </div>
    <?php endif; ?>
    <?php if ($_SESSION['user'] ?? false) : ?>
      <div class="ms-2">
        <form action="/logout" method="post">
          <input type="hidden" name="_method" value='delete'>
          <button type="submit">Logout</button>
        </form>
      </div>
    <?php endif; ?>

  </nav>
</header>