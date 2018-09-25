$(document).foundation()

var lastCommand = "";

function getCommand(command, separator = ""){
    var commands = {
        "f" : "<img src='/files/images/controls/f"+separator+".png'>",
        "b" : "<img src='/files/images/controls/b"+separator+".png'>",
        "u" : "<img src='/files/images/controls/u"+separator+".png'>",
        "u/b" : "<img src='/files/images/controls/ub"+separator+".png'>",
        "u/f" : "<img src='/files/images/controls/uf"+separator+".png'>",
        "d" : "<img src='/files/images/controls/d"+separator+".png'>",
        "d/b" : "<img src='/files/images/controls/db"+separator+".png'>",
        "d/f" : "<img src='/files/images/controls/df"+separator+".png'>",
        "1" : "<img src='/files/images/controls/1.png'>",
        "2" : "<img src='/files/images/controls/2.png'>",
        "3" : "<img src='/files/images/controls/3.png'>",
        "4" : "<img src='/files/images/controls/4.png'>",
        "ws" : "While standing",
        "wr" : "While running",
        "wc" : "While crouching",
        "od" : "Opponent down",
        "wh" : "When hit",
        "ir" : "In rage",
        "*" : "Hold",
        "n" : "<img src='/files/images/controls/n.png'>",
        "12" : "<img src='/files/images/controls/1+2.png'>",
        "13" : "<img src='/files/images/controls/1+3.png'>",
        "14" : "<img src='/files/images/controls/1+4.png'>",
        "23" : "<img src='/files/images/controls/2+3.png'>",
        "24" : "<img src='/files/images/controls/2+4.png'>",
        "34" : "<img src='/files/images/controls/3+4.png'>",
        "123" : "<img src='/files/images/controls/1+2+3.png'>",
        "124" : "<img src='/files/images/controls/1+2+4.png'>",
        "134" : "<img src='/files/images/controls/1+3+4.png'>",
        "234" : "<img src='/files/images/controls/2+3+4.png'>",
        "1234" : "<img src='/files/images/controls/1+2+3+4.png'>",
        "default" : command,
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
        document.getElementById("show_command").innerHTML = "";
        document.getElementById("show_command").innerHTML = convertCommand(document.getElementById('move_command').value);
    }catch (e) {
        alert(e);
    }
}

function convertCommand(text){
    try{
        var endCommand = "";
        if (text.search('\\*')>-1){
            text = text.replace(/[*]/g,",");
            endCommand += "Hold";
        }
        var commands = text.split(',');

        for (i = 0; i < commands.length; i++){
            if (commands[i].search('\\+')>0){
                var direction = "";
                var tempTextArray = commands[i].split('+');
                if(commands[i].search('f')>=0 ||
                    commands[i].search('b')>=0 ||
                    commands[i].search("u")>=0 ||
                    commands[i].search("d")>=0 ||
                    commands[i].search("d/f")>=0 ||
                    commands[i].search("u/f")>=0 ||
                    commands[i].search("d/b")>=0 ||
                    commands[i].search("u/b")>=0
                ){
                    direction = getCommand(tempTextArray[0],"+");
                    tempTextArray[0] = "";
                }
                endCommand += direction + getCommand(convertString(tempTextArray), "+")+" ";
            }else if(commands[i].search('~') > 0){
                var tempTextArray = commands[i].split('~');
                var tempText = "<img src='/files/images/controls/[.png'>";
                for (j = 0; j < tempTextArray.length; j++) {
                    tempText += getCommand(tempTextArray[j]);
                }
                tempText += "<img src='/files/images/controls/].png'>";
                endCommand += tempText+" ";
            }else{
                endCommand += getCommand(commands[i])+" ";
            }
        }
        return endCommand;
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

function convertString(stringArray){
    stringArray.sort();
    var tempText = "";
    for (j = 0; j < stringArray.length; j++){
        tempText += stringArray[j];
    }
    return tempText;
}