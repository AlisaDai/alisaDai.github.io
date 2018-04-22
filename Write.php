<html>
    <header>
		<link rel="stylesheet" href="style.css">
        <script>
            onload=function(){
                var i = 0;
                var imgs = document.getElementsByTagName("img")
                document.getElementById("filename").onchange = function (evt) {
                    var tgt = evt.target || window.event.srcElement, files = tgt.files;
                    //var selectedFile = event.target.files[0]

                    for(i=0; i<imgs.length; i++){
                        if(imgs[i].src == ""){
                            break
                        }
                    }
                    if (FileReader && files && files.length) {
                        var fr = new FileReader()
                        fr.onload = function () {
                            imgs[i].src = fr.result
                        }
                        fr.readAsDataURL(files[0])
                    }else{
                        aler("wrong")
                    }
                }
                document.getElementById("text").onchange = function() {
                    var texts = document.getElementById("text")
                    var paras = document.getElementsByTagName("p")
                    paras[i-1].innerHTML = texts.value
                }
                document.getElementById("url").onchange = function() {
                    var url = document.getElementById("url")
                    var urlp = document.getElementById("urlp")
                    urlp.innerHTML = "URL: "+url.value
                }
                document.getElementById("submit").onclick = function() {
                    document.getElementById("add").innerHTML = ""
                    window.print()
                    location.reload()
                }
            }
        </script>
    </header>
    <body>
        <div class="bgformat">
            <h1 style="text-align: center"><img src="data/writinglist.png" id="titleimg">Write</h1>
            <hr>
            <img id="myimage1" width="250px">
            <p id="para1"></p>
            <img id="myimage2" width="250px">
            <p id="para2"></p>
            <img id="myimage3" width="250px">
            <p id="para3"></p>
            <div id="urlp"></div>
            <div id="add">
                <hr>
                <form action="Write.php" method="post">
                    <input type="file" id="filename"><br>
                    <textarea id="text" style="height: 200px; width: 400px" placeholder="Make some Notes here"></textarea><br>
                    <label for="url">URL: </label><input type="url" id="url"><br>
                    <input type="button" id="save" value="save"><input type="submit" id="submit" value="submit">
                </form>
                <input type="submit" onclick="window.location='PersonalApp.php'" value="Go Back">
            </div>
        </div>
    </body>
</html>
        