$(window).on("load", function() {
    $('[data-toggle="tooltip"]').tooltip();
    if ($("#death-day").val() || $("#death-place").val() || $("#death-country").val())
        $("#death-check").prop("checked", true);
    else
        $("#death-form").hide();
});
function unchecked(){
    $('[type=radio]').prop("checked", false);
}
function showDeathForm(checkbox){
    if ($(checkbox).is(":checked"))
        $("#death-form").show();
    else
        $("#death-form").hide();
}
function checkBirthDeathDay(){

    let deathDay = changeDateFormat($("#death-day").val());
    let inputDay = document.getElementById("death-day");
    if (deathDay) {
        let birthDay = changeDateFormat($("#birth-day").val());
        if (Date.parse(deathDay) < Date.parse(birthDay))
            inputDay.setCustomValidity("Športovec sa musí skôr narodiť ako zomrieť");
        else
            inputDay.setCustomValidity("");
    }
    else
        inputDay.setCustomValidity("");
}
function changeDateFormat(day){
    let dayArray = day.split(".");
    if (dayArray.length === 3)
        return dayArray[2] +"-"+(dayArray[1].length ===1? "0"+dayArray[1]:dayArray[1])+"-"+(dayArray[0].length ===1? "0"+dayArray[0]:dayArray[0]);

    return null;
}
