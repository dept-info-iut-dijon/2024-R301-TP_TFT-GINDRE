<?php
$this->layout('template', ['title' => 'Add origin - TP TFT']);

$origins = [];
?>
<section class="max-w-3xl mx-auto">
    <form class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <input type="text" aria-label="Search" class="tft-input col-span-2" placeholder="Search">

        <select aria-label="Search to field" name="column" class="tft-input">
            <?php foreach ($columnNames as $columnName) : ?>
                <option value="<?= $columnName ?>"><?= $columnName ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit">
            Search
        </button>
    </form>
</section>


