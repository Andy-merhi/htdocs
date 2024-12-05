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
//Add New record
$(document).on('click', '#addnew', function(){
    if ($('#code').val()=="" || $('#description').val()==""){
        alert('Please input data first'); }
    else{
    $code=$('#code').val();
    $description=$('#description').val();               
        $.ajax({
            type: "POST",
            url: "addnew-ajax.php",
            data: {
                code: $code,
                description: $description,
                add: 1,
            },
            success: function(){
                $('#code').val("");
                $('#description').val("");
                showMajor();
            }
        });
    }
});

//Edit or Update
$(document).on('click', '.edit', function(){
    $code=$(this).val();    
    $description=$('#description').val();  
        $.ajax({
            type: "POST",
            url: "update-ajax.php",
            data: {
                code: $code, 
                description: $description,
                edit: 1,
            },
            success: function(){
                $('#description').val("");
                showMajor();
            }
        }); 
    });
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
       
