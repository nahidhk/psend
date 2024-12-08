<?php $tid = $_GET['id'] ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>invoice :: Psend</title>
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50% , -50%) ;" class="popup">
        <Center>
            <h2>Search!</h2>
            <form action="/invoice/" method="get">
            <input value="<?php echo $tid ?>" class="input" type="search" name="id" id="" placeholder="input the Invoce ID">
            <button class="btnlg">Search</button>
            </form>
        </Center>
    </div>
</body>

</html>