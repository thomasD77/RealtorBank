$(".dropzone").dropzone({
    dictDefaultMessage: "<i class='fa fa-cloud-upload'></i> Click here or drop files to upload",
});

$(".header-user-name").on("click", function() {
    $(".header-user-menu ul").toggleClass("hu-menu-vis");
    $(this).toggleClass("hu-menu-visdec");
});


