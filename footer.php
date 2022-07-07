
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script> 

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->

  <script> 
  $(document).ready(function(){           


     $("#hide").click(function(){
       $("#show").fadeToggle('fast');
     });

  });

  $(document).ready(function(){

  $("#myshow").click(function(){
    $("#results-show").show()




  });
});


 </script>

<script type="text/javascript">
        
function myprint(){
var print_div = document.getElementById("printTable");
var print_area = window.open();
print_area.document.write(print_div.innerHTML);
print_area.document.close();
print_area.focus();
print_area.print();
print_area.close();
    }

  </script>
 </script>



</body>

</html>