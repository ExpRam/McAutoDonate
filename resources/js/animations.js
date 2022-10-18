function makeOpacityAnimation(show, object) {
    if(show) {
        $(object).css('opacity', 0).animate({ opacity: 1 }).removeClass('hidden');
        $("body").css("overflow", "hidden");
    } else {
        $(object).css('opacity', 1).animate({ opacity: 0 }, 300, 'linear', () => $(object).addClass('hidden'));
        $("body").css("overflow", "visible");
    }
}

$("body").on("click", ".show-button", function(event) {
    const data = $(this).parent().parent().children(".data");
    $(this).text(data.css("display") == "none" ? "Close" : "Show");
    data.slideToggle(200);

}).on("click", ".buy", (event) => makeOpacityAnimation(true, "#buy-modal")

).on("click", "#description", (event) => makeOpacityAnimation(true, "#description-modal")

).on("click", "#close-desc", (event) => makeOpacityAnimation(false, "#description-modal")

).on("click", "#close-buy", function() {
    makeOpacityAnimation(false, "#buy-modal");
    $("#buy-modal").find("input,textarea,select").val('').end();
    
}).on("click", "#mobile-menu-button", (event) => $("#mobile-menu").slideToggle(200));