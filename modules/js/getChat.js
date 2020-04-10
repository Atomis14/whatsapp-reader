function getChat(name) {
    console.log(name);
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'modules/php/displayChat.php?path='+name, true);

    xhr.onload = function(){
       chatContent = this.responseText;
       document.getElementById("chat").innerHTML = chatContent;
    }

    xhr.send();
}