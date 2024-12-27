<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="/img/Psend Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psend</title>
</head>

<body>
    <br>
    <section class="flex center">
        <div style="width: 80%;background-color: rgb(255, 255, 255);">
            <div>
            <center>
                <h3>Calculator</h3>
                <hr>
            </center>
        </div>
            <form action="/php/send.php" method="post">
                <div id="next1">
                    <label for="">Currencies<n>*</n></label><br>
                    <div class="cubox">
                        <input class="" type="text" name="price" id="price" required>
                        <img id="showflag" alt="">
                        <select onchange="ifcall()" name="currency" id="currency">
                            <option value="AED">AED</option>
                            <option value="BDT">BDT</option>
                            <option value="SAR">SAR</option>
                            <option value="MYR">MYR</option>
                        </select>
                    </div>
                    <n><i>Last Update: <span id="updateio"></span></i></n><br>
                    <label for=""><span id="showbname">Loading...</span>
                        <n>*</n>
                    </label><br>
                    <input oninput="calculatorio()" class="input" type="number" name="cpt" id="cpt" required><br>
                    <label for="">বাংলাদেশি টাকা<n>*</n></label><br>
                    <input class="input" type="text" name="bdt" id="bdt" required><br>
                    <br>
                    <div class="btnx" id="nextbtn1" onclick="next1()">Next</div>
                </div>
                <div id="next2" class="vcc">
                    <center>
                        <h3>Both Methods</h3>
                        <hr>
                    </center>
                    <div class="flex beet">
                        <div id="bkash" onclick="methods('bkash')" class="card">
                            <img src="img/bkash.svg" alt="">
                        </div>
                        <div id="nagad" onclick="methods('nagad')" class="card">
                            <img src="img/nagad.svg" alt="">
                        </div>
                    </div>
                    <div>
                        <input id="smethod" name="methoads" class="false" type="text" required>
                        <label for=""><span id="outputmethod">Select any Methods</span>
                            <n>*</n>
                        </label><br>
                        <input name="accno" oninput="typeaccount()" style="width: 90%;" class="cubox input"
                            placeholder="Type account number" type="number" required>
                    </div>
               
                <input class="false" type="text" name="adminid" id="adminid">
                <input class="false" type="text" name="adminpin" id="adminpin">
                <input class="false" type="text" name="adminname" id="adminname">
                <input class="false" type="text" name="country" id="countrysho">
                <input class="false" type="text" name="fee" id="fee">
                <input class="false" type="text" name="adminimg" id="adminimg">
                <button class="btnlg">Send</button>
            </form>
        </div>
        </div>
    </section>
    <?php include 'bottom.php'; ?>
    <script src="login.js"></script>
    <script src="psend.js"></script>
    <script src="too.js"></script>
</body>

</html>