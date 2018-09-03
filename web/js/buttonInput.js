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

function setHitLevel(hitLevel){
    try{
        var text = "";
        if (document.getElementById('move_hitLevel').value !== ""){
            text +=", ";
        }
        text += hitLevel;
        document.getElementById('move_hitLevel').value += text;
    }catch (e) {
        alert(e);
    }
}

function clearField(field){
    try{
        document.getElementById(field).value = "";
    }catch (e) {
        alert(e);
    }
}
