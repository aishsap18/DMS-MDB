<html>
<head>

    <script language="Javascript">

        function showFBWindow(){
            url = "tempfb.html"
            thiswindow=window.open(url,'name','height=200,width=150');
            if (window.focus) {newwindow.focus()}
        }

    </script>

</head>
<body>

    <input type="button" OnClick="showFBWindow()" value="Open FB" />

</body>
</html>