<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psend Admin</title>
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <br><br><br>
    <br><br><br>
    <div class="flex anaround ">
        <div class="popup">
            <center>
                <h1>login Admin</h1>
                <input id="password" class="input" placeholder="*******" type="password">
                <button onclick="loindart()" class="btnlg">login</button>
                <script>
                    function loindart(){
                        let passwordint = '51614824' ;
                        const elementpass = document.getElementById("password").value;
                        if (elementpass === passwordint) {
                            sessionStorage.setItem("admin",true);
                            window.location.href="/admin/admin.html";
                        } else {
                            sessionStorage.setItem("admin",false); 
                            alert(false);     
                        }
                    }
                </script>
            </center>
        </div>
    </div>
</body>

</html>