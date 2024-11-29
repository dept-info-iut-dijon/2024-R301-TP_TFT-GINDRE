<?php
$this->layout('template', ['title' => 'TP TFT']);
?>
<h1>TFT - Set <?= $this->e($tftSetName) ?></h1>

<p class="mb-4">
    <?= $this->e($message) ?>
</p>

<section class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
    <?php for ($i = 0; $i < count($units); $i++) { ?>
        <?php $this->insert('partials/unit-card', ['unit' => $units[$i]]) ?>
    <?php } ?>
</section>
