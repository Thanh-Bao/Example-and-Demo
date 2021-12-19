<!DOCTYPE html>
<html>

<head>
</head>
<script src="https://www.gstatic.com/firebasejs/8.8.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.8.0/firebase-database.js"></script>
<script>
    // FIREBASE REALTIME DATABASE 

    // rule in console dasboard firebase
    //     {
    //   "rules": {
    //     ".read": true,
    //     ".write": true
    //   }
    // }
    var firebaseConfig = {
        databaseURL: "https://test-c1b1e-default-rtdb.asia-southeast1.firebasedatabase.app",
    };
    firebase.initializeApp(firebaseConfig);
</script>
<form onsubmit="return sendMessage();">
    <input id="myName" placeholder="name?" autocomplete="off">
    <input id="message" placeholder="message?" autocomplete="off">
    <input type="submit">
</form>
<script>
    function sendMessage() {
        firebase.database().ref("messages").push().set({
            "sender": document.getElementById("myName").value,
            "message": document.getElementById("message").value
        });
        return false;
    }
</script>
<ul id="messagesList"></ul>
<script>
    firebase.database().ref("messages").on("child_added", function(snapshot) {
        html = "<li>";
        html += snapshot.val().sender + ": " + snapshot.val().message;
        html += "</li>";
        document.getElementById("messagesList").innerHTML += html;
    });
</script>

</html>
