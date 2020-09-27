<!doctype html>

					   
<html>
        <link rel="stylesheet" href="../site/assets/css/reset.css" type="text/css">
        <link rel="stylesheet" href="../site/assets/css/main.css" type="text/css">
		<form action="search.php" method="GET" id="form1">
		   <div action="search.php" class="filt" >
			  <ul >
                  <li onclick="myFunction()" >Offer type</li>
				  <li id="myDIV">
                       <ul>
					      <li><input type="radio" value="all"checked="checked"  name="offertype">all</input></li>
					      <li><input type="radio" value="free" name="offertype">free</input></li>
						  <li><input type="radio" value="trade"name="offertype">trade</input></li>
						  <li><input type="radio" value="sell" name="offertype">sell</input></li>
						</ul>
                  </li>
				 
                  <li onclick="myFunction2()">Publisher
				   <li id="myDIV2">
                     <input type="search" name="publisher" placeholder="enter publisher name">	
                  </li>
				  </li>
				
                  <li  onclick="myFunction3()">pricing</li>
				  <li id="myDIV3">
                      
					      <ul>
					      <li><input type="radio" checked="checked" name="price order" value="low">Lowest to Highest</input></li>
						  <li><input type="radio" name="price order" value="high">Highest to Lowest </input></li>
						  
						</ul>   
                  </li>
				  </li >
                  
				 
              </ul> 
			  
			 </div>
			 
	
		 </form>
			  
	   
<script>
function myFunction() {
    var x = document.getElementById('myDIV');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
function myFunction2(){
    var x = document.getElementById('myDIV2');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
function myFunction3(){
    var x = document.getElementById('myDIV3');
	
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
function myFunction4(){
    var x = document.getElementById('myDIV4');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}

</script>
		
		
    </body>
</html>