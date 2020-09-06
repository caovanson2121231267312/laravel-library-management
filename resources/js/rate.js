$(document).ready(function() {
    $("#myRate").rateYo({
        fullStar: true,
        onSet:function(ratting, rateYoInstance) {
            $('#ratting').val(ratting);
        }
    });

    $("#rate").rateYo({
        fullStar: true,
        readOnly: true,
        rating: $("#rate").attr('data-rate')
    });
});
