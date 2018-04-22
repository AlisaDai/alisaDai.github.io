<html>
    <header>
		<link rel="stylesheet" href="style.css">
        <script>
            onload=function(){
                document.getElementById("filename").onchange = function (evt) {
                    var tgt = evt.target || window.event.srcElement, files = tgt.files;
                    //var selectedFile = event.target.files[0]

                    if (FileReader && files && files.length) {
                        var fr = new FileReader()
                        fr.onload = function () {
                            //alert(files[0].type)
                            reset()
                            if(files[0].type.match("image")){
                                var img = document.createElement("img")
                                img.id = "img"
                                img.src = fr.result
                                img.setAttribute("style", "width: 100%")
                                document.getElementById("read").appendChild(img)
                            }else if(files[0].type.match("text")){
                                var para = document.createElement("p")
                                para.id = "para"
                                para.innerHTML = fr.result
                                document.getElementById("read").appendChild(para)
                            }else{
                                var others = document.createElement("object")
                                others.id = "others"
                                others.setAttribute("data", fr.result)
                                others.setAttribute("type", files[0].type)
                                others.setAttribute("style", "width: 100%; height: 90%")
                                document.getElementById("read").appendChild(others)
                            }
                        }
                        if(files[0].type.match("text")){
                            fr.readAsText(files[0])
                        }else{
                            fr.readAsDataURL(files[0])
                        }
                    }else{
                        aler("something wrong")
                    }
                }
            }
            function  reset () {
                if(document.getElementById("read").hasChildNodes()){
                    document.getElementById("read").removeChild(document.getElementById("read").firstChild)
                }
                //document.getElementById("myimg").innerHTML=""
                //document.getElementById("para").innerHTML = ""
                //document.getElementById("others").innerHTML = ""
            }
        </script>
    </header>
    <body>
        <div class="bgformat">
            <h1 style="text-align: center"><img src="data/writinglist.png" id="titleimg">Read</h1>
            <hr>
            <div id="read">
            </div>
            <form action="Write.php" method="post">
                <input type="file" id="filename">
            </form>
            <input type="submit" onclick="window.location='PersonalApp.php'" value="Go Back">
        </div>
    </body>
</html>