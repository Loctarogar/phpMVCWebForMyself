<html>
<head>
</head>
<body>

<div><?php echo $content ?></div>
<button type="button" onclick="loadDoc()">Request data</button>

<p id="demo">Dynamically changes data</p>
<script>
    function loadDoc() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("demo").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "/main/test", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xhttp.send("id=2&newid=5");
    }
</script>

</body>
</html>

