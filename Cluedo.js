function rollDice()
{
    var die1 = document.getElementById("die1");
    var die2 = document.getElementById("die2");
    die1.innerHTML = Math.ceil(Math.random() * 5);
    die2.innerHTML = Math.ceil(Math.random() * 5);
}