<div>
    <div class="relative">
        <img class="aspect-[4/3] object-cover object-center z-0 size-full" src="<?= $this->e($unit->getUrlImg()) ?>" alt="<?= $this->e($unit->getName()) ?>">
        <div class="absolute top-0 shadow-[inset_64px_0px_128px] shadow-black/60 left-0 w-full z-10 h-full flex flex-col justify-between">
            <div class="p-2">
                <a href="/?action=editUnit&id=<?= $this->e($unit->getId()) ?>">
                            <span class="material-symbols-outlined text-amber-300">
                                edit
                            </span>
                </a>
                <a href="/?action=delUnit&id=<?= $this->e($unit->getId()) ?>">
                            <span class="material-symbols-outlined text-amber-300">
                                delete
                            </span>
                </a>
            </div>
            <ul class="text-white space-y-1 p-4">
                <?php for ($j = 0; $j < count($unit->getOrigin()); $j++) { ?>
                    <li class="flex gap-1">
                        <img class="w-6 h-6" src="<?= $this->e($unit->getOrigin()[$j]->getUrlImg()) ?>" alt="<?= $this->e($unit->getOrigin()[$j]->getName()) ?>">
                        <p>
                            <?= $this->e($unit->getOrigin()[$j]->getName()) ?>
                        </p>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="bg-indigo-900 text-white p-4 flex items-center justify-between">
        <h2><?= $this->e($unit->getName()) ?></h2>
        <div class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-amber-300">
                        toll
                    </span>
            <?= $this->e($unit->getCost()) ?>
        </div>
    </div>
</div>
