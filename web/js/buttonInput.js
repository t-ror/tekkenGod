$(document).foundation()

var lastCommand = "";

function getCommand(command){
    var commands = {
        "f" : "Forward",
        "b" : "Back",
        "u" : "Up",
        "d" : "Down",
        "1" : "1",
        "2" : "2",
        "3" : "3",
        "4" : "4",
        "ws" : "While standing",
        "wr" : "While running",
        "1+2" : "1+2",
        "1+3" : "1+3",
        "1+4" : "1+4",
        "2+3" : "2+3",
        "2+4" : "2+4",
        "3+4" : "3+4",
        "default" : "",
    };

    return commands[command] || commands["default"];
}


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
            text +=",";
        }
        text += command;
        document.getElementById('move_command').value += text;
        lastCommand = command;
        convertCommand(document.getElementById('move_command').value);
    }catch (e) {
        alert(e);
    }
}

function convertCommand(text){
    try{
        var commands = text.split(',');
        document.getElementById("show_command").innerHTML = "";
        for (i = 0; i < commands.length; i++){
            document.getElementById("show_command").innerHTML += getCommand(commands[i]);
        }
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
        if (field === "move_command"){
            document.getElementById("show_command").innerHTML = "";
        }
    }catch (e) {
        alert(e);
    }
}
