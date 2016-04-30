function rollDice()
{
    var die1 = document.getElementById("die1");
    var die2 = document.getElementById("die2");
    var moveButton = document.getElementById("moveButton");
    if (die1.innerHTML == "#")
    {
        die1.innerHTML = Math.ceil(Math.random() * 5);
    }

    if (die2.innerHTML == "#")
    {
        die2.innerHTML = Math.ceil(Math.random() * 5);
    }
    moveButton.innerHTML = "<button data-toggle='modal' data-target='#moveModal' class='btn btn-success'>Move</button>";
}

function accuse()
{
    alert("accusation");
}

function checkMovement()
{
    var die1 = document.getElementById("die1");
    var die2 = document.getElementById("die2");
    var maxMoves = parseInt(die1.innerHTML) + parseInt(die2.innerHTML);

    var change_x = document.getElementById("change_x").value;
    var change_y = document.getElementById("change_y").value;

    if (Math.abs(change_x) + Math.abs(change_y) > maxMoves)
    {
        document.getElementById("change_x").style = "background-color:lightcoral";
        document.getElementById("change_y").style = "background-color:lightcoral";
        document.getElementById("message").innerHTML = "This exceeds your maximum moves of " + maxMoves + ".";
        document.getElementById("submit_button").type = "button";
    }
    else
    {
        document.getElementById("change_x").style = "";
        document.getElementById("change_y").style = "";
        document.getElementById("message").innerHTML = "";
        document.getElementById("submit_button").type = "Submit";
    }
}

function playerInputs()
{
    var characters = ["Miss Scarlet","Colonel Mustard","Mrs. White","Mr. Green","Mrs Peacock","Professor Plum"];
    var numPlayers = document.getElementById("numPlayers");
    var html = "";
    for (x = 0; x < numPlayers.value; x++)
    {
        html += "<label for=player"+(x+1)+"_ID>Player " + (x+1) + " Name:</label>";
        html += "<input class='form-control' name='player"+ (x+1) +"_ID' type='text' />";
        html += "<br/>";
        html += "<select class='form-control character-select' onclick='checkCharacters()' onblur='checkCharacters()' name='character"+(x+1)+"'>";

        for (y = 0; y < characters.length; y++)
        {
            html += "<option>";
            html += characters[y];
            html += "</option>";
        }
        html += "</select><br>";
    }
    html += "<div align='center'> <input type='submit' id='submit-button' value='Start' class='btn btn-default'> </div>";
    document.getElementById("players_login").innerHTML = html;
    checkCharacters();
}

function checkCharacters()
{
    var inputs = document.getElementsByClassName("character-select");
    var currentInput;
    for (x = 0; x < inputs.length; x++)
    {
        for (y = 0; y < inputs.length; y++)
        {
            if (x != y)
            {
                if (inputs[x].value == inputs[y].value)
                {
                    document.getElementById('submit-button').type='button';
                    inputs[y].style = 'background-color:lightcoral';
                }
                else
                {
                    document.getElementById('submit-button').type='submit';
                    inputs[y].style = 'background-color:white';
                }
            }
        }
    }
}
