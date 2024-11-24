ClassicEditor.create(document.querySelector("#body")).catch((error) => {
    console.error(error);
});

$(document).ready(function () {
    $("#postTable").DataTable();
});
