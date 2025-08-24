$(document).ready(function() {
    $('#input-533').on('keyup', function() {
        var query = $(this).val();
        $.ajax({
            url: '/get-dropdown-options', // Ganti dengan endpoint Anda
            method: 'GET',
            data: { q: query },
            success: function(data) {
                var $dropdown = $('#dropdown-536');
                $dropdown.empty();
                $.each(data.options, function(i, option) {
                    $dropdown.append($('<option>', {
                        value: option.value,
                        text: option.text
                    }));
                });
            }
        });
    });
});