//Delete
$(document).on('click', '.delete', function(){
    $dcode=$(this).val();
        $.ajax({
            type: "POST",
            url: "delete-ajax.php",
            data: {
                code: $dcode,
                del: 1,
            },
            success: function(){
                showMajor();
            }
        });
});