/*global $,owl,smoothScroll,alert,mCustomScrollbar,fileinput*/
$(document).ready(function () {
    "use strict";

    $('.profile-edit').click(function () {
        $('.info_edit').css({
            display: "block"
        });
        $('.info_view').css({
            display: "none"
        });
    });

    $('.hide-edit').click(function () {
        $('.info_edit').css({
            display: "none"
        });
        $('.info_view').css({
            display: "block"
        });
    });

    $('.personal-edit').click(function () {
        $('.pers_edit').css({
            display: "block"
        });
        $('.pers_view').css({
            display: "none"
        });
    });

    $('.hide1-edit').click(function () {
        $('.pers_edit').css({
            display: "none"
        });
        $('.pers_view').css({
            display: "block"
        });
    });

    $(".top-nav-inner, .list-group, .mbl-messages").mCustomScrollbar({
        theme: "dark-3",
        scrollInertia: 100
    });

    $('.dropdown-menu').on("click", function (e) {
        e.stopPropagation();
    });


    $("#input-ke-1").fileinput({
        theme: "explorer",
        uploadUrl: "/file-upload-batch/20",
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        initialPreviewAsData: true
    });

    $("#input-folder-1").fileinput({
        maxFileCount: 1,
        theme: "explorer",
        uploadUrl: "/file-upload-batch/2",
        allowedFileExtensions: ["jpg", "png"],
        maxImageWidth: 226,
        maxImageHeight: 226
    });
 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $("#input-folder-5").fileinput({
        theme: "explorer",
        // uploadUrl: "javascript:deleteacomment({{$comment->id}});"
        uploadUrl: "/OnTime/public/uploadcommentfile",
        uploadExtraData : {_token: CSRF_TOKEN},

    });
$('#input-folder-5').on('fileuploaded', function(event, data, previewId, index) {
   var form = data.form, files = data.files, extra = data.extra, 
    response = data.response, reader = data.reader;
    alert (extra.bdInteli + " " +  response.uploaded);
});

    $(".work-slider").owlCarousel({
        transitionStyle: "fadeUp",
        navigation: true,
        slideSpeed: 500,
        paginationSpeed: 400,
        singleItem: true,
        responsive: true,
        autoPlay: false,
        pagination: true,
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        stopOnHover: true,
        video: true
    });

    $('.kv-gly-star').rating({
        containerClass: 'is-star'
    });

});