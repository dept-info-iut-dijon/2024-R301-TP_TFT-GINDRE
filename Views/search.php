<?php
$this->layout('template', ['title' => 'Add origin - TP TFT']);
?>
<section class="max-w-3xl mx-auto">
    <form class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8" method="post">
        <input type="hidden" name="action" value="search">

        <input type="text" name="search" aria-label="Search" class="tft-input col-span-2" placeholder="Search">

        <select aria-label="Search to field" name="column" class="tft-input">
            <?php foreach ($columnNames as $columnName) : ?>
                <option value="<?= $columnName ?>"><?= $columnName ?></option>
            <?php endforeach; ?>
            <option value="origin">origin</option>
        </select>

        <button type="submit">
            Search
        </button>
    </form>

    <p class="mb-4">
        <?= $this->e($message) ?>
    </p>

    <section class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
        <?php if (isset($units)) { ?>
            <?php for ($i = 0; $i < count($units); $i++) { ?>
                <?php $this->insert('partials/unit-card', ['unit' => $units[$i]]) ?>
            <?php } ?>
        <?php } ?>
    </section>
</section>


