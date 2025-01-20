<style>
    * {
        font-family: Arial, Helvetica, sans-serif;
    }

    .container {
        padding-top: 1em;
        background-color: white;
        width: 100%;
        text-align: center;
    }

    .codigo {
        padding: 1em;
        text-align: center;
        background-color: gray;
    }

    .titulo {
        font-size: 1em;
    }
</style>

<div class="container">
    <h1 class="titulo">Su código de verificación es:</h1>
    <div class="codigo">
        {{ $codigo }}
    </div>
</div>
