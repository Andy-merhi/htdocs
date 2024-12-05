<style>
    label{
    width: 5%;
    display: inline-block;
    }
</style>
<!-- Include jQuery library -->
<script src="jquery-3.7.1.min.js"></script>
<script src="script2.js"></script>
<h1>Add Student</h1>
<form class = "form-inline">
    <div class = "form-group">
    <label>First Name:</label>
    <input type  = "text" id = "fname">
    </div>

    <div class = "form-group">
        <label>Last Name:</label>
        <input type = "text" id ="lname" >
    </div>

    <div class = "form-group">
        <label>DOB:</label>
        <input type  = "text" id ="dob" >
    </div>

    <div class = "form-group">
        <label>Email:</label>
        <input type  = "text" id ="email" >
    </div>

    <div class = "form-group">
        <label>Major:</label>
        <input type  = "text" id ="major" >
    </div>
    
    <div class = "form-group">
        <button type = "button" class="addnew" >Add</button>
    </div>
</form>