<?php
$this->layout('template', ['title' => 'Add origin - TP TFT']);

$origins = [];
?>
<section class="max-w-3xl mx-auto">
    <h1>
        Add origin
    </h1>

    <form>
        <!-- Name, Cost, Origin, Img Url -->
        <label class="label-input-group">
            <span>Name</span>
            <input type="text" name="name">
        </label>

        <label class="label-input-group">
            <span>Img Url</span>
            <input type="text" name="imgUrl">
        </label>

        <button type="submit" class="mt-12">
            Add origin
        </button>
    </form>
</section>


