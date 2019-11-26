$(".header-list li").hover(function () {
    $(this).find($(".sub-page-navH")).stop(true, false).slideDown(300);
},function () {
    $(this).find($(".sub-page-navH")).stop(true, false).slideUp(300);
});



