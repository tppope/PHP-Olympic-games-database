$(window).on("load", function() {
    $('[data-toggle="tooltip"]').tooltip();
    checkYear();
});
function checkYear(){
    let olympicGamesYear = Number($("#olympics option:checked").text().match(/\d+/g)[0]);
    let selectOlympics = document.getElementById("olympics");
    let birthDayDeathday = $("#athlete-select option:checked").attr('id').match(/\d+/g);
    if (olympicGamesYear < Number(birthDayDeathday[2]))
        selectOlympics.setCustomValidity("Rok olympiády musí byť počas života športovca");
    else if (birthDayDeathday.length > 3 && Number(birthDayDeathday[5]) < olympicGamesYear)
        selectOlympics.setCustomValidity("Rok olympiády musí byť počas života športovca");
    else
        selectOlympics.setCustomValidity("");
}
