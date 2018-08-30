$(document).foundation()
var lastCommand = "";

function setCommand(command){
    try{
        var text = "";
        if (document.getElementById('move_command').value !== ""
            && command !== "+"
            && command !== "/"
            && command !== "~"
            && command !== "*"
            && lastCommand !== "+"
            && lastCommand !== "/"
            && lastCommand !== "~"
            && lastCommand !== "*"
        ){
            text +=", ";
        }
        text += command;
        document.getElementById('move_command').value += text;
        lastCommand = command;
    }catch (e) {
        alert(e);
    }
}

function clearCommand(){
    try{
        document.getElementById('move_command').value = "";
    }catch (e) {
        alert(e);
    }
}
