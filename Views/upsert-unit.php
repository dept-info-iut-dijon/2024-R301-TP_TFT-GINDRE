<?php
$this->layout('template', ['title' => 'Add/Edit unit - TP TFT']);
?>
<section class="max-w-3xl mx-auto">
    <h1>
        <?php if (isset($unit)): ?>
            Edit <?= $unit->getName() ?>
        <?php else: ?>
            Add unit
        <?php endif; ?>
    </h1>

    <?php if (isset($message)): ?>
        <p class="mb-4">
            <?= $message ?>
        </p>
    <?php endif; ?>

    <form method="post">
        <input type="hidden" name="action" value="<?= isset($unit) ? 'editUnit' : 'addUnit' ?>">

        <?php if (isset($unit)): ?>
            <input type="hidden" name="id" value="<?= $unit->getId() ?>">
        <?php endif; ?>

        <label class="label-input-group">
            <span>Name</span>
            <input type="text" name="name" value="<?= isset($unit) ? $unit?->getName() : '' ?>">
        </label>

        <label class="label-input-group">
            <span>Cost</span>
            <input type="number" name="cost" value="<?= isset($unit) ? $unit?->getCost() : '' ?>">
        </label>

        <label class="label-input-group">
            <span>Origin</span>
            <select multiple name="origin[]">
                <?php foreach ($origins as $origin): ?>
                    <option value="<?= $origin->getId() ?>" <?= isset($unit) && in_array($origin->getId(), array_map(fn($o) => $o->getId(), $unit->getOrigin())) ? 'selected' : '' ?>>
                        <?= $origin->getName() ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>

        <label class="label-input-group">
            <span>Img Url</span>
            <input type="text" name="imgUrl" value="<?= isset($unit) ? $unit?->getUrlImg() : '' ?>">
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


