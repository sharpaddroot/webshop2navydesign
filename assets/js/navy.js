$(function () {
    $('[data-toggle="tooltip"]').tooltip()
    })
      $(document).ready(function(){
          $("#myModal").modal('show');
      });
      $(document).ready(function regispass(){$("#regis").modal('show');});
    function usenews() {
            document.getElementById('event').style.display = "none";
            document.getElementById('promotion').style.display = "none";
            document.getElementById('news').style.display = "block";
  
    }
    function useevent() {
            document.getElementById('event').style.display = "block";
            document.getElementById('news').style.display = "none";
            document.getElementById('promotion').style.display = "none";
  
        }
    function usepromotion() {
            document.getElementById('news').style.display = "none";
            document.getElementById('promotion').style.display = "block";
            document.getElementById('event').style.display = "none";
  
        }
        