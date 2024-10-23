<?php
$this->layout('template', ['title' => 'Add/Edit unit - TP TFT']);

$origins = [];
?>
<section class="max-w-3xl mx-auto">
    <h1>
        <?php if (isset($unit)): ?>
            Edit <?= $unit->getName() ?>
        <?php else: ?>
            Add unit
        <?php endif; ?>
    </h1>

    <form>
        <!-- Name, Cost, Origin, Img Url -->
        <label class="label-input-group">
            <span>Name</span>
            <input type="text" name="name" value="<?= $unit?->getName() ?? '' ?>">
        </label>

        <label class="label-input-group">
            <span>Cost</span>
            <input type="number" name="cost" value="<?= $unit?->getCost() ?? '' ?>">
        </label>

        <label class="label-input-group">
            <span>Origin</span>
            <select name="origin">
                <?php foreach ($origins as $origin): ?>
                    <option value="<?= $origin->getId() ?>" <?= isset($unit) && $unit->getOrigin()->getId() === $origin->getId() ? 'selected' : '' ?>>
                        <?= $origin->getName() ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>

        <label class="label-input-group">
            <span>Img Url</span>
            <input type="text" name="imgUrl" value="<?= $unit?->getUrlImg() ?? '' ?>">
        </label>

        <button type="submit" class="mt-12">
            <?php if (isset($unit)): ?>
                Edit
            <?php else: ?>
                Add
            <?php endif; ?>
        </button>
    </form>
</section>


