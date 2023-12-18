<style>
    .example {
        font-family: 'Poppins';
        display:flex;
        flex-wrap: wrap;
        align-items: center;
        flex-direction: column;
    }
</style>
<div class="example">
    <h1>Example View</h1>
    <p>Method: <?= $_SERVER['REQUEST_METHOD']?></p>
    <h3>
        <?=
        $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].
        $_SERVER['REQUEST_URI'];
        ?>
    </h3>
</div>