<script src="https://www.gstatic.com/firebasejs/8.8.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.8.0/firebase-database.js"></script>
<script>
  var firebaseConfig = {
    apiKey: "AIzaSyDcsbxR0BZDaHyiKbvBgu5jNKOFAQoBS00",
    authDomain: "sgfdsfsdf-f6c53.firebaseapp.com",
    databaseURL: "https://sgfdsfsdf-f6c53-default-rtdb.asia-southeast1.firebasedatabase.app",
    projectId: "sgfdsfsdf-f6c53",
    storageBucket: "sgfdsfsdf-f6c53.appspot.com",
    messagingSenderId: "258739330034",
    appId: "1:258739330034:web:d5fd883091bb2566dd696b"
  };
  firebase.initializeApp(firebaseConfig);
  var myName = prompt("Nhập tên");
</script>
<h1> Bảo Bảo Chat - app chat bảo mật - an toàn nhất thế giới :)))) </h1>
<form onsubmit="return sendMessage();">
    <input id="message" placeholder="Nhập tin nhắn" autocomplete="off">
    <input type="submit">
</form>
<script>
    function sendMessage() {
        var message = document.getElementById("message").value;
        firebase.database().ref("messages").push().set({
            "sender": myName,
            "message": message
        });
        return false;
    }
</script>
<ul id="messages"></ul>
<script>
    firebase.database().ref("messages").on("child_added", function (snapshot) {
        var html = "";
        html += "<li id='message-" + snapshot.key + "'>";
        html += snapshot.val().sender + ": " + snapshot.val().message;
        html += "</li>";
        document.getElementById("messages").innerHTML += html;
    });
</script>
