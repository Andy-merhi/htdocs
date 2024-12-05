function showSt(){
    $.ajax({
        url: 'showajax.php',
        type: 'POST',
        async: false,
        data:{
            show: 1
        },
        success: function(response){
            $('#stDiv').html(response);
        }
    });
}
//Add New record
$(document).on('click', '.addnew', function(){
    if ($('#fname').val()=="" || $('#lname').val()==""||$('#dob').val()==""||$('#email').val()==""||$('#major').val()==""){
        alert('Please input data first'); }
    else{
    $fname=$('#fname').val();
    $lname=$('#lname').val(); 
    $dob=$('#dob').val();  
    $major=$('#major').val();  
    $email=$('#email').val();                
        $.ajax({
            type: "POST",
            url: "addajax.php",
            data: {
                fname: $fname,
                lname: $lname,
                dob:$dob,
                major:$major,
                email:$email,
                add: 1,
            },
            success: function(){
                $('#fname').val('');
                 $('#lname').val('');
                 $('#dob').val('');
                 $('#email').val('');
                 $('#major').val('');
                 alert("Added to the database!");
            }
        });
    }
});

//Edit or Update
$(document).on('click', '.edit', function(){
    $id=$(this).val();    
    // Redirect to another page
    window.location.href = "http://localhost/Week12/updatePage.php?id=" + encodeURIComponent($id);
    });
//Delete
$(document).on('click', '.delete', function(){
    $id=$(this).val();
        $.ajax({
            type: "POST",
            url: "deleteajax.php",
            data: {
                id: $id,
                del: 1,
            },
            success: function(){
                alert("Deleted!");
                showSt();
            }
        });
});
   