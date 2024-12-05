function showMajor(){
    $.ajax({
        url: 'show-major-ajax.php',
        type: 'POST',
        async: false,
        data:{
            show: 1
        },
        success: function(response){
            $('#userTable').html(response);
        }
    });
}