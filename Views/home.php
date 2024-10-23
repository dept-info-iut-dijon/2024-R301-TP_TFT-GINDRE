<?php
$this->layout('template', ['title' => 'TP TFT']);


$attack = [
    'True Damage',
    'True Damage',
    'True Damage',
]
?>
<h1>TFT - Set <?= $this->e($tftSetName) ?></h1>

<p class="mb-4 text-green-700">
    <?= $this->e($message) ?>
</p>

<section class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
    <?php for ($i = 0; $i < count($units); $i++) { ?>
        <div>
            <div class="relative">
                <img class="aspect-[4/3] object-cover object-center z-0 size-full" src="<?= $this->e($units[$i]->getUrlImg()) ?>" alt="<?= $this->e($units[$i]->getName()) ?>">
                <div class="absolute top-0 shadow-[inset_64px_0px_128px] shadow-black/60 left-0 w-full z-10 h-full flex flex-col justify-between">
                    <div class="p-2">
                        <a href="/?action=editUnit&id=<?= $this->e($units[$i]->getId()) ?>">
                            <span class="material-symbols-outlined text-amber-300">
                                edit
                            </span>
                        </a>
                        <button>
                            <span class="material-symbols-outlined text-amber-300">
                                delete
                            </span>
                        </button>
                    </div>
                    <ul class="text-white space-y-1 p-4">
                        <?php for ($j = 0; $j < count($attack); $j++) { ?>
                            <li class="flex gap-1">
                                <span class="material-symbols-outlined text-amber-300 drop-shadow-[0_8px_8px_#fcd34d88]">
                                    explosion
                                </span>
                                <p>
                                    <?= $this->e($attack[$j]) ?>
                                </p>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="bg-indigo-900 text-white p-4 flex items-center justify-between">
                <h2><?= $this->e($units[$i]->getName()) ?></h2>
                <div class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-amber-300">
                        toll
                    </span>
                    <?= $this->e($units[$i]->getCost()) ?>
                </div>
            </div>
        </div>
    <?php } ?>
</section>
