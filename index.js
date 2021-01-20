
$(document).ready(function () {
    //banner caroulse
    $("#banner-area .owl-carousel").owlCarousel({
        dots: true,
        items: 1
    });

    //top sale carousel
    $("#top-sale .owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            },
        }
    });

    //isotope filter
    var $grid = $(".grid").isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
    });

    //filter item on button click
    $(".button-group").on("click", "button", function () {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
    });


    // New phone carousel
    $("#new-phones .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            },
        }
    });

    //Blogs owl-carousel
    $("#blogs .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            }
        }
    });

    //Product qty section
    let $qty_up = $(".qty .qty-up");
    let $qty_down = $(".qty .qty-down");
    let $deal_price = $("#deal-price");
    // let $input = $(".qty .qty_input")
    //Click on qty button
    $qty_up.click(function (e) {

        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

        // change product price using ajax
        $.ajax({
            url: "template/ajax.php",
            type: 'post',
            data: { itemid: $(this).data("id") },
            success: function (result) {
                let obj = JSON.parse(result);
                let item_price = obj[0]['GiaTien']

                if ($input.val() >= 1 && $input.val() < 10) {
                    $input.val(function (i, oldval) {

                        return ++oldval;
                    })


                    // incresing price of product
                    $price.text(parseInt(item_price * $input.val()));

                    //set subtotal price
                    let subtotal = parseInt($deal_price.text()) + parseInt(item_price);
                    $deal_price.text(subtotal);
                }

            }
        }); // closing ajax func

    });
    $qty_down.click(function (e) {
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

        $.ajax({
            url: "template/ajax.php",
            type: 'post',
            data: { itemid: $(this).data("id") },
            success: function (result) {
                let obj = JSON.parse(result);
                let item_price = obj[0]['GiaTien']

                if ($input.val() > 1 && $input.val() <= 10) {
                    $input.val(function (i, oldval) {
                        return --oldval;
                    })
                    // incresing price of product
                    $price.text(parseInt(item_price * $input.val()));

                    //set subtotal price
                    let subtotal = parseInt($deal_price.text()) - parseInt(item_price);
                    $deal_price.text(subtotal);
                }


            }
        }); // closing ajax func

    });


});

