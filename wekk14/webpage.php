<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Full Example</title>
  <style>
    label{
    width: 5%;
    display: inline-block;
    }
  </style>
  <!-- Include jQuery library -->
  <script src="jquery-3.7.1.min.js"></script>
  <script src="script.js"></script>
</head>
<body>

  <h1>Our page</h1>
  <form class = "form-inline">
     <div class = "form-group">
      <label>Code:</label>
      <input type  = "text" id = "code">
     </div>
      <div class = "form-group">
       <label>Description:</label>
          <input type  = "text" id ="description" >
      </div>
      <div class = "form-group">
         <button type = "button" id="addnew" > Add</button>
     </div>
    </form>
    <br><hr>
    <!-- Section for displaying data -->
    <div class="row">
        <div id="userTable"></div>   
    </div>
    <!--<button id="click-me" class="btn-click">Click me!</button>-/->

  <script>
    // jQuery function to handle button click
    $(document).ready(function () {
    //onclick function
    //or use in the selector $('.btn-click')..
      $('#click-me').click(function () {
        alert('Button clicked!');
      });
    });
  </script>-->
  <script>
    $(document).ready(function(){
    // function to get all the major using select
    showMajor(); 
    //rest of functions have event listners using jquery
    }
    );
  </script>
</body>
</html>


