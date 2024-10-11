<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="public/css/main.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:FILL@1" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->e($title) ?></title>
</head>

<body>
<header>
    <!-- Menu -->
    <nav>

    </nav>
</header>
<!-- #contenu -->
<main id="contenu" class="max-w-7xl px-4 mx-auto">
    <?=$this->section('content')?>
</main>
<footer>

</footer>
</body>

</html>