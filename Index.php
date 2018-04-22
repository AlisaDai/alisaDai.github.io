<html>
    <head>
		<link rel="stylesheet" href="style.css">
        <script>
            var img1 = document.getElementById("imgs")
            var file = document.getElementById("file")
            function onFileSelected(event) {
                var selectedFile = event.target.files[0];
                var reader = new FileReader();

                var imgtag = document.getElementById("myimage");
                imgtag.title = selectedFile.name;

                reader.onload = function(event) {
                    imgtag.src = event.target.result;
                };

                reader.readAsDataURL(selectedFile);
            }
        </script>
    </head>
    <body>
		<div class="bgformat">
			<h1 style="text-align: center"><img src="data/writinglist.png" id="titleimg">Read & Write</h1>
			<hr>
			<?php
			   session_start();
				if(isset($_POST["option"])){
					$button = $_POST["option"];
					if($button == "Read"){
						$_SESSION["usage"] = "read";
					}else if($button == "Write"){
						$_SESSION["usage"] = "write";
					}
					if(isset($_SESSION["usage"])){
						$usage = $_SESSION["usage"];
						if($usage == "read"){
							header("location: read.php");
						}else if($usage == "write"){
							header("location: write.php");
						}
						echo "<hr>";
					}
				}
			?>
            <div class="coverpage">
			    <img src="data/notes.jpg">
            </div>
			<form action="PersonalApp.php" style="text-align: center" method="post">
				<input type="radio" name="option" value="Read">Read File
				<input type="radio" name="option" value="Write">Write File
				<input type="submit" value="Submit">
			</form>
		</div>
    </body>
</html>

