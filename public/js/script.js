$(function () {
    const osztalyok = ["szf1A", "szf1B", "szf2A", "iru1", "iru2"]
    const token = $('meta[name="csrf-token"]').attr("content");
    const myAjax = new MyAjax(token);
    myAjax.getAjax("/roki", tevekenysegKilistazasa)
    myAjax.getAjax("/molly", tablazatKiir)
    osztalyKilistazasa()
    function tevekenysegKilistazasa(tomb) {
        $("#tevekenyseg-valaszto").empty()
        $("#tevekenyseg-valaszto").append("<option disabled selected>Válassz egy tevékenységet!</option>")
        tomb.forEach(element => {
            $("#tevekenyseg-valaszto").append("<option id=" + element.tevekenyseg_id + ">" + element.tevekenyseg_nev + "</option>")
        });

    }
    function osztalyKilistazasa() {
        $("#osztaly-valaszto").empty()
        $("#osztaly-valaszto").append("<option disabled selected>Válassz egy osztályt!</option>")
        osztalyok.forEach((element, index) => {
            $("#osztaly-valaszto").append("<option id=" + index + ">" + element + "</option>")

        })
    }
    function tablazatKiir(tomb) {
        let jovairas = ""
        $("#tevekenysegek").empty()
        $("#tevekenysegek").append(
            "<thead><th>Osztály</th><th>Tevékenység</th><th>Pontszám</th><th>Státusz</th></thead>")
        $("#tevekenysegek").append("<tbody></tbody>")
        for (let index = 0; index < tomb.length; index++) {
            const element = tomb[index];

            if (element.allapot ==0) {
                jovairas = "Nincs jóváhagyva!"
            } else if (element.allapot == 1) {
                jovairas = "jóváhagyva"
            }
            $("#tevekenysegek").append(
                "<tr><td>" + osztalyok[element.osztaly_id] +
                "</td><td>" + element.tevekenyseg.tevekenyseg_nev +
                "</td><td>" + element.tevekenyseg.pontszam +

                "</td><td>" + jovairas + "</td></tr>")
        }
    }
    $("#ok").on("click", function () {
        const adat = {
            osztaly_id: $("#osztaly-valaszto").children(':selected').attr('id'),
            tevekenyseg_id: $("#tevekenyseg-valaszto").children(':selected').attr('id')
        }
        myAjax.postAjax("/molly", adat)
    })
    $(".search").on("keyup",function(){
        let ertek =  $(".search").val()
        let apiKereses = "/kereses?search="+ertek
        myAjax.getAjax(apiKereses,tablazatKiir)
    })
    $("#rendezes").on("change",function(){
        let ertek=$("#rendezes").children(":selected").attr('id')
        let apiKereses="/kereses?sort="+ertek
        myAjax.getAjax(apiKereses,tablazatKiir)
    })
})