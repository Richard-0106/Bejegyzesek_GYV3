<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content=<?php $token = csrf_token();
                                    echo $token; ?>>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/Ajax.js"></script>
    <script src="js/script.js"></script>
    <title>Li Richárd </title>
</head>

<body>
    <main>
        <header>
            <h1>Zöldítjük ki a földet!</h1>
        </header>
        <article>
            <fieldset>
                <legend>Mit tettél ma a földért?</legend>
                <select id="osztaly-valaszto"></select>
                <select id="tevekenyseg-valaszto"></select>
                <input type="button" value="Ok" id="ok">
            </fieldset>
        </article>
        <div id="szures-tarolo">
                    <div class="search-container">
                        <div class="search-icon"></div>
                        <div class="input-container">
                            <input type="text" class="search" placeholder="Keresés...">
                            <span class="clear"></span>
                        </div>
                    </div>
        <section id="tabla-tarolo">
                <select  id="rendezes">
                    <option id="pontszam">Pontszám</option>
                    <option id="osztaly_id">osztaly</option>
                    <option id="tevekenyseg_nev">Tevékenység név</option>
                </select>
            <table id="tevekenysegek">
                
            </table>
        </section>
    </main>
</body>

</html>