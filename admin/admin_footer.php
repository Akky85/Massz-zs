<footer>
    <div class="lila container-fluid justify-content-center text-center text-white pt-5 pb-2">
        <div class="col-sm-12">
            <p><small>Copyright © 2020 Akky theme. All Rights Reserved.</small></p>
        </div>
    </div>
</footer>

<script>
 
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("navbar").style.padding = "10px 0px";
    document.getElementById("logo").style.fontSize = "20px";
  } else {
    document.getElementById("navbar").style.padding = "20px 10px";
    document.getElementById("logo").style.fontSize = "30px";
  }
}
/* placeholderre egy script, de nem működik.*/
$(document).ready(function() {        
    $('#megjegyzes').html5form({
        allBrowsers : true,
        responseDiv : '#response',
        messages: 'en',
        messages: 'es',
        method : 'GET',
        colorOn :'#d2d2d2',
        colorOff :'#000'
    }
);
});


</script>
<script src="ajax.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>