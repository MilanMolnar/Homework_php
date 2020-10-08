$(document).ready(function(){
    $("#inputField").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#listItems li").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});