function rollDice()
{
    var die1 = document.getElementById("die1");
    var die2 = document.getElementById("die2");
    die1.innerHTML = Math.ceil(Math.random() * 5);
    die2.innerHTML = Math.ceil(Math.random() * 5);
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
        html += "<select class='form-control character-select' onclick='checkCharacters()' onblur='checkCharacters()' name='character'>";

        for (y = 0; y < characters.length; y++)
        {
            html += "<option>";
            html += characters[y];
            html += "</option>";
        }
        html += "</select><br>";
    }
    html += "<div align='center'> <input type='submit' id='submit-button' value='Start' class='btn btn-default'>Start</input> </div>";
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