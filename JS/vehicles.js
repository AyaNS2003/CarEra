
let cars = document.getElementsByClassName("card");

function selectEV(){
    for (let i = 0 ; i < cars.length ; i++)
    {
        cars[i].style.display = 'none';
    }
    let EVcars = document.getElementsByClassName("EV");

    if (EVcars.length == 0)
        {
            document.getElementById('no-available').style.display = 'block';
            return;
        }

    for (let i = 0 ; i < EVcars.length ; i++)
    {
        EVcars[i].style.display = 'inline-block';
    }
    document.getElementById('no-available').style.display = 'none';
}

function selectSUV()
{
    for (let i = 0 ; i < cars.length ; i++)
    {
        cars[i].style.display = 'none';
     }
    let SUVcars = document.getElementsByClassName("SUV");

    if (SUVcars.length == 0)
        {
            document.getElementById('no-available').style.display = 'block';
            return;
        }

    for (let i = 0 ; i < SUVcars.length ; i++)
    {
        SUVcars[i].style.display = 'inline-block';
    }
    document.getElementById('no-available').style.display = 'none';
}
function selectTruck()
{
    for (let i = 0 ; i < cars.length ; i++)
    {
        cars[i].style.display = 'none';
    }
    let t = document.getElementsByClassName("truck");
    if (t.length == 0)
        {
            document.getElementById('no-available').style.display = 'block';
            return;
        }

    for (let i = 0 ; i < t.length ; i++)
    {
        t[i].style.display = 'inline-block';
    }
    document.getElementById('no-available').style.display = 'none';
}
function selectSedan()
{
    for (let i = 0 ; i < cars.length ; i++)
    {
        cars[i].style.display = 'none';
    }
    let sedanCars = document.getElementsByClassName("sedan");
    if (sedanCars.length == 0)
        {
            document.getElementById('no-available').style.display = 'block';
            return;
        }
    for (let i = 0 ; i < sedanCars.length ; i++)
    {
        sedanCars[i].style.display = 'inline-block';
    }
    document.getElementById('no-available').style.display = 'none';
}
function selectHybrid()
{
    for (let i = 0 ; i < cars.length ; i++)
    {
        cars[i].style.display = 'none';
    }
    let Hycars = document.getElementsByClassName("hybrid");
    if (Hycars.length == 0)
        {
            document.getElementById('no-available').style.display = 'block';
            return;
        }
    for (let i = 0 ; i < Hycars.length ; i++)
    {
        Hycars[i].style.display = 'inline-block';
    }
    document.getElementById('no-available').style.display = 'none';
}

function more_info(carIndex)
{
    document.getElementById('discription').style.display = 'block';
    showCarInfo(carIndex);
}
function closeInfo()
{
    document.getElementById('discription').style.display = 'none';
}

function more_Info()
{
    document.getElementById('discription').style.display = 'block';
}