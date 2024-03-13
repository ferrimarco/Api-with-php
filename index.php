<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>API w/php</title>
</head>
<body>
    <div class="container">
        <button class="apiBtn" value="users.php">Click Here</button>
        <div class="loader"></div>

        <div class="content" style="display: none;">
            <p class="status"></p>
            <ul class="usersList"></ul>
        </div>
    </div>

    <!--- Script click btn -->
    <script>
        document.querySelector('.apiBtn').addEventListener('click', function(){
            document.querySelector(".apiBtn").style.display = "none";
            document.querySelector(".loader").style.display = "block";
            setTimeout(function() {
                document.querySelector(".loader").style.display = "none";
                document.querySelector(".content").style.display = "block";
            }, 2000); // Simulazione del caricamento per 1 secondo
        });
    </script>

    <!-- Script api  -->
    <script>
    function renderUsers(data){
        document.querySelector(".status").innerHTML = `Status: <span style="color: green;">${data.status}</span> - Message: <span style="color: green;"> ${data.message} </span>`;
    
        const usersList = document.querySelector('.usersList');
        usersList.innerHTML = '';

        for(let user of data.payload) {
            let listItem = document.createElement('li');
            listItem.innerText = `${user.name} ${user.surname}, ${user.age} anni`;
            usersList.appendChild(listItem);
        }
    }

    document.querySelector('.apiBtn').addEventListener('click', function(){
        // Nascondi il contenuto e mostra l'animazione di caricamento
        document.querySelector(".content").style.display = "none";
        document.querySelector(".loader").style.display = "block";

        fetch('./users.php')
            .then(function (response){
                return response.json()
            })      
            .then(function(data){
                console.log(data)
                renderUsers(data)
            })
            .catch(function (error){
                document.querySelector(".status").innerHTML = `Status: <span style="color: red;">Error</span> - Message: <span style="color: red;"> Unexpected token </span>`;
                console.error('error');
            });
    });
    </script>
</body>
</html>
