<!DOCTYPE HTML>
<html> 
<head> 
<title>Sign-In</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<title>Dicom Files Upload to PACS</title>
<link href="./../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="./../bootstrap/js/bootstrap.min.js"></script>

</head>
<body> 
<div class="container">
<div id="Sign-In"> 
<h1>LOG-IN HERE</h1>

UserName <br><input id="user" type="text" name="user" size="40" required/><br> 
Password <br><input type="password" name="pass" size="40" required/><br> 
<button id="button" onclick=myFunction()>submit</button>

</div> 
<br/>
<p id="view" style='display:none'>
</p>
<script type="text/javascript">
function myFunction() {
	document.getElementById("view").style.display="block";
	document.getElementById("user").disabled = true;
    var pId = document.getElementById("user").value;
    var pname = "Satyanarayana";
    
    // document.getElementById("view").innerHTML="";
	// document.getElementById("view").innerHTML="<p>Successfully logged in</p><br><div id=\"View-dicom\" ><form action=\"upload.php\" method=\"POST\" target=\"_blank\"><input type=\"hidden\" name=\"gateway\" value=\"HIPL\"></input><input type=\"hidden\" name=\"pName\" value=\""+pname+"\"></input><input type=\"hidden\" name=\"pid\" value=\""+pid+"\"></input><input id=\"vb\" type=\"submit\" value=\"View/Upload Dicom Images\">  </input></form></div>";
    
    alert("success");
    /*$.post("http://telerad.telehealthindia.com/index.php",
    {
      username:"HIPL",
      password:"hipl"
    },
    function(data,status){
      alert("Data: " + data + "\nStatus: " + status );
    });*/
    
    function createCORSRequest(method, url) {
      var xhr = new XMLHttpRequest();
      if ("withCredentials" in xhr) {
        // XHR for Chrome/Firefox/Opera/Safari.
        xhr.open(method, url, true);
      } else if (typeof XDomainRequest != "undefined") {
        // XDomainRequest for IE.
        xhr = new XDomainRequest();
        xhr.open(method, url);
      } else {
        // CORS not supported.
        xhr = null;
      }
      return xhr;
    }

    // Helper method to parse the title tag from the response.
    function getTitle(text) {
      return text.match('<title>(.*)?</title>')[1];
    }

    // Make the actual CORS request.
    function makeCorsRequest() {
      // All HTML5 Rocks properties support CORS.
      var url = 'test.php';

      var xhr = createCORSRequest('POST', url);
      if (!xhr) {
        alert('CORS not supported');
        return;
      }

      // Response handlers.
      xhr.onload = function() {
        var text = xhr.responseText;
        var title = getTitle(text);
        alert('Response from CORS request to ' + url + ': ' + title);
      };

      xhr.onerror = function() {
        alert('Woops, there was an error making the request.');
      };

      xhr.send();
    }
    makeCorsRequest();
   }
</script>
</div>
</body> 
</html> 