s=0;
$(".Dropdown").click(function () {
    if(s==0){
        $(this).find($("#Dhl")).slideDown(500);
        s=1
    }else {
        $(this).find($("#Dhl")).slideUp(500);
        s=0
    }
});