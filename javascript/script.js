$(window).on("load", function() {
    $('[data-toggle="tooltip"]').tooltip();
    $("#top10-winners-table").hide();
});
function changeView(){
    let radioSwitch = $("#radio-a");
    if(radioSwitch.is(":checked")){
        $("#all-winners-table").show();
        $("#top10-winners-table").hide();
        $("#main-h2").text("Všetci olympijskí víťazi");
    }
    else{
        $("#all-winners-table").hide();
        $("#top10-winners-table").show();
        $("#main-h2").text("Top 10 olympijských víťazov");
    }
}
function sortTable(n) {
    let table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("all-winners");
    arrowSwitch(n-1);
    switching = true;
    dir = "asc";
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            if (dir === "asc") {
                if ($(x).text().localeCompare($(y).text(),'sk') === 1) {
                    shouldSwitch = true;
                    break;
                }
            } else if (dir === "desc") {
                if ($(x).text().localeCompare($(y).text(),'sk') === -1){
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount ++;
        } else {
            if (switchcount === 0 && dir === "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
    if (n === 3){
        let typeCount = countOHType(table);
        console.log(typeCount);
        sortByYear(1,typeCount);
        sortByYear(typeCount)
    }

}
function countOHType(table){
    let i = 1;
    let OhType = $(table.rows[i].getElementsByTagName("TD")[3]).text();
    for (i = 2; i < table.rows.length; i++) {
        if ($(table.rows[i].getElementsByTagName("TD")[3]).text() !== OhType)
            break;
    }
    return i;
}
function sortByYear(from = 1,rowLength = 0) {
    let n = 2;
    let table, rows, switching, x, y,i, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("all-winners");
    if(from === 1 && rowLength ===0)
        arrowSwitch(n-1);
    switching = true;
    dir = "asc";
    while (switching) {
        switching = false;
        rows = table.rows;
        if (!rowLength)
        {
            console.log("ahoj");
            rowLength = rows.length;

        }

        for (i = from; i < (rowLength - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            if (dir === "asc") {
                if (Number($(x).text()) > Number($(y).text())) {
                    shouldSwitch = true;
                    break;
                }
            } else if (dir === "desc") {
                if (Number($(x).text()) < Number($(y).text())){
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount ++;
        } else {
            if (switchcount === 0 && dir === "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}

function arrowSwitch(n){
    let arrowsSwitches = $(".sort-arrows");
    for (let i = 0; i < arrowsSwitches.length; i++) {
        let arrows = $(arrowsSwitches.get(i)).find("img");
        if (i === n){
            if ($(arrows.get(1)).css("visibility")==="visible"){
                $(arrows.get(1)).css("visibility","hidden");
                $(arrows.get(0)).css("visibility","visible");
            }
            else{
                $(arrows.get(1)).css("visibility","visible");
                $(arrows.get(0)).css("visibility","hidden");

            }

        }else
            arrows.css("visibility","visible")
    }

}
function hoverNameOver(nameTh){
    $(nameTh).parent().find(".click-person").css("background-color", "rgba(210, 191, 55, 0.3)");
}
function hoverNameOut(nameTh){
    $(nameTh).parent().find(".click-person").css("background-color", "white");

}
