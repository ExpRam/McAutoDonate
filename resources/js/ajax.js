let donate = '';
var delayTimer = 0;

function getPrice(donate) {
    const nickname = $("#nickname").text();
    const promocode = $("#promocode").val();
    const scrf = $('input[name="_token"]').attr("value");
    $.ajax({
        url: "get/price",
        type: "POST",
        dataType: "json",
        contentType: 'application/json; charset=utf-8',
        data: JSON.stringify({
            "_token": scrf,
            "donate": donate,
            "nickname": nickname,
            "promocode": promocode
        }),
        success: function (response) {
            if (!response.error) $("#buy-button").text("Buy for " + response.price + "RUB");
        },
    });
}

function setPrice() {
    const promocode = $("#promocode").val();
    $("#buy-button").text("Wait...");
    clearTimeout(delayTimer);
    delayTimer = setTimeout(function () {
        getPrice(donate);
    }, 1000);
}

$.ajax({
    url: `uuid/${$("#nickname").text()}`,
    type: "get",
    success: function (response) {

        const url = `https://visage.surgeplay.com/face/80/${response.uuid === 'invalid' ? 'X-Steve' : response.uuid}`;
        $("#avatar").attr("src", url);
    },
});

$("body").on("click", ".buy", function (event) {
    donate = $(this).parent().children('.title').text();
    $("#buy-button").text("Wait...");
    getPrice(donate);
}).on("keyup", "#promocode", function (event) {
    setPrice();
}).on("click", "#buy-button", function (event) {
    const nickname = $("#nickname").text();
    const promocode = $("#promocode").val();
    const scrf = $('input[name="_token"]').attr("value");

    $.ajax({
        url: "qiwi/donate",
        type: "POST",
        dataType: "json",
        contentType: 'application/json; charset=utf-8',
        data: JSON.stringify({
            "_token": scrf,
            "donate": donate,
            "nickname": nickname,
            "promocode": promocode
        }),
        success: function (response) {
            if (!response.error) window.location.href = response.link;
        },
    });
});

