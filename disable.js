<script>



document.oncopy = function(){alert("copy option disabled"); return false;}

document.oncut = function(){alert("cut option disabled");return false;}

document.onpaste = function(){alert("paste option disabled");return false;}




//Disable mouse right click

document.onmousedown = disableclick;

msg = "Right Click Disabled";

function disableclick(e)

{

     if(event.button==2)

     {

     alert(msg);

     return false;

   }

}

</script>