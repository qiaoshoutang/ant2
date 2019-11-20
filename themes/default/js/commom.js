$(".header-list li").hover(function () {
    $(this).find($(".sub-page-navH")).slideDown(500);
},function () {
    $(this).find($(".sub-page-navH")).slideUp(500);
});