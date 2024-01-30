<?php require(base_path("views/partials/head.php")) ?>
<?php require(base_path("views/partials/nav.php")) ?>
<?php require(base_path("views/partials/banner.php")) ?>


<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p class="mb-6"><a href='/notes' class='text-blue-500 hover:underline mb-10'>Go back..</a>
        </p>
        <p>
            <?= htmlspecialchars($note['body']) ?>
        </p>

        <form method="POST" class="mt-6">
            <input type='hidden' name="_method" value="DELETE">
            <input name='id' type='hidden' value='<?= $note['id'] ?>'>
            <button class="text-sm text-red-500">Delete</button>
        </form>
    </div>
</main>


<?php require base_path("views/partials/footer.php") ?>
