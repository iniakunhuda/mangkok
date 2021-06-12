function ratingStarProduct() {
    $('.rating-stars').each((index, value) => {
        var rate = $(value).attr('value');
        if ($(value).attr('value') === 0) {
            rate = null;
        }
        $(value).barrating({
            theme: 'fontawesome-stars',
            initialRating: rate
        });
    });
}

$(function() {
    ratingStarProduct();
});