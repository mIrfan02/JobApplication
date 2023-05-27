
    $(document).ready(function () {
        var alertMessage = $('#alertMessage');
        if (alertMessage.length) {
            alertMessage.addClass('show');
            setTimeout(function () {
                alertMessage.removeClass('show');
            }, 5000);
        }
    });

