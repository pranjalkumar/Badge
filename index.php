<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="MOM 2K17">
    <title>MOM2K17 | Frame</title>
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> 

   <script>

    var s;
                // facebook initialization
                window.fbAsyncInit = function() {
                    FB.init({
                      appId      : '1064781583632699',
                      xfbml      : true,
                      version    : 'v2.5'
                    });
                    
                };
                (function(d, s, id){
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) {return;}
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/en_US/sdk.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
                
                function login() {
                        FB.login(function(response) {
                                if (response.status === 'connected') {
                                // successful connection
                                s=response.authResponse.userID;
                                document.getElementById('login').style.visibility = 'hidden';
				                        document.getElementById('upload').style.display = 'block';

				                        getPhoto();
                        } else if (response.status === 'not_authorized') {
                                /*not logged in the app*/
				                alert("OOPS!!!Some error has occured please try it again");
                                        
                        } else {
                                /*not logged in the facebook account*/
					             alert("OOPS!!! Some error has occured please try it again");

                        }
                        }, {scope: 'publish_actions'});
                }
                // getting basic user info
                function getInfo() {
                        FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id'}, function(response) {
                                
                        });
                }
                // uploading photo 
                function uploadPhoto() {
                        console.log("Uploading");
                        
                FB.api(
                    "/me/photos",
                    "POST",
                    {
                        "url": "1681379271888040.jpg"

                    },
                    function (response)     

                         {
                                if (!response || response.error) {
                                        
					 alert("OOPS!! Some error has occured");
                                        console.log(response.error);
                                } else {
//                                        
						alert("Your photo has been successfuly uploaded");
						window.location.href="index.php";
                                }
                        });
                }

        function getPhoto()
        {
                FB.api(
                        "/me/picture",
                        {height : 400,
width:400},
                        function (response)
                        {
                                if(response && !response.error)
                                {
                                        console.log(response.data);
                                        senddata(response.data.url);
                                }
                                else {
                                        console.log(response.error);
                                }
                        }
                        )
        }

        function senddata(url)
        {

                var params = "url="+encodeURI(url)+"&id="+s;
                console.log(url);
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "overlay.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


                 xhttp.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200) {
                console.log("done");

//                uploadPhoto();
		            document.getElementById("test").src=s+".jpg";

  }
  };
  
  xhttp.send(params);
        }
        </script>


  </head>

  <body>
          <img id="test" src="" alt="DP" /> 
			       <style>
             #test {
              width:30%;
              height:auto;
             } 
             </style>
            <div class='row'>
              <div class='col-md-4'></div>
                <div id="upload"  class='col-md-4' style="display:none">
                <a href="#" onclick="uploadPhoto()" class="btn btn-lg btn-primary btn-block"><i class="fa fa-facebook-official" aria-hidden="true"></i>
                Upload photo to Facebook</a>
               </div>
              <div id = "login" class='col-md-4'>
            		<a href="#" onclick="login()" class="btn btn-lg btn-primary btn-block"><i class="fa fa-facebook-official" aria-hidden="true"></i>
                Login with Facebook</a> 
              </div>
              <div class='col-md-4'></div>
            </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>

