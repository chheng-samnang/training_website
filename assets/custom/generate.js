$(document).ready(function(){
  var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
             document.getElementById("content").innerHTML = this.responseText;

               $("#btnSubmit").click(function(){
                 $("form").submit();
               });

         }
     };
     xmlhttp.open("GET", "generate/generate.php", true);
     xmlhttp.send();
});
