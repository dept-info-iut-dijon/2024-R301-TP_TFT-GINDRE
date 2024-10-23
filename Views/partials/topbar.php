<?php
$links = [
    [
        'title' => 'Accueil',
        'url' => '/'
    ],
    [
        'title' => 'Ajouter une unité',
        'url' => '?action=addUnit'
    ],
    [
        'title' => 'Ajouter une origine',
        'url' => '?action=addUnitOrigin'
    ],
    [
        'title' => 'Rechercher',
        'url' => '?action=search'
    ]
];
?>

<header class="sticky z-30 top-0 bg-black text-white flex justify-between items-center mb-8 px-4 md:px-12 h-16">
    <img src="/public/img/logo.png" class="w-8 h-auto" alt="TFT">
    <nav id="menu" class="fixed bg-black top-16 left-0 w-full h-[calc(100dvh-64px)] hidden md:block md:static md:h-auto md:w-auto md:bg-transparent md:top-auto md:flex md:items-center md:justify-center">
        <ul class="flex w-full items-center md:gap-12 flex-col md:flex-row divide-y divide-amber-300 md:divide-y-0 pt-8 md:pt-0">
            <?php foreach ($links as $link): ?>
                <li class="py-4 md:py-0 w-full md:w-auto text-center">
                    <a href="<?= $link['url'] ?>" class="hover:text-amber-300 transition-colors duration-300" ><?= $link['title'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <button id="menu-button" class="md:hidden size-8 flex items-center justify-center">
        <span id="open-menu-icon" class="material-symbols-outlined !text-3xl">
            menu
        </span>
        <span id="close-menu-icon" class="material-symbols-outlined !text-3xl !hidden">
            close
        </span>
    </button>
</header>
