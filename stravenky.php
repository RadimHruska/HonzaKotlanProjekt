<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
<?php $thisPage="MealTickets"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>Kalasová stravování</title>
</head>
<style>
   #MealTicket0 table{border-collapse: collapse;}
   #MealTicket0 table td{width: 140px; height: 90px; border: 1px solid black;}
   #MealTicket1 table{border-collapse: collapse;}
   #MealTicket1 table td{width: 140px; height: 90px; border: 1px solid black;}
   #MealTicket1{visibility: hidden;}
</style>
<style media="print">
    #MealTicket1{visibility: visible; margin-top: 10px;}
    #controls{visibility: hidden; height: 0px}
    h1{visibility: hidden; height: 0px;}
    #backgroundBlock {background-color: white; padding: 0px; border-radius: 10px; margin-top: 0px;}
    nav{visibility: hidden;}

    </style>
        <?php include("scripts.php"); ?>
<script>
    
    function GenMealTicket(){
        let days  = ["PO", "ÚT", "ST", "ČT", "PÁ"];
        let months  = ["Leden", "Únor", "Březen", "Duben", "Květen", "Červen", "Červenec", "Srpen", "Září", "Říjen", "Listopad", "Prosinec"];
        let monthNumber = controls.Month.value;
        let montsValues = new Array();
        let monthsNumbers = new Array();
        let start = controls.Start.value;
        let stop = controls.Stop.value;
        let year = controls.Year.value;
        let daysNumbers = new Array();
        let printedDays = new Array();
        let help = 0;
        let index=0;
        let indexDays = 0;
        let indexTableHelp = 0;
        let indexOfNumberPlus = 0;
        let text;

         for(let k = 1; k<= 60; k++){
            daysNumbers[indexDays] = k;
            indexDays ++;
        }
        daysNumbers.forEach(day => {
           
            if(day >= start)
            {

           
            if(help ==7)
         {
            help = 0;
         }
            if(help<5 && day>=start && day<=stop)
            {
                printedDays[index] = day;
                index++;
            }
            if(help < 7)
            {
                help++;
            }
        }
            
        });
        index = 0;
        printedDays.forEach(day => {
           let help;
           if(monthNumber == 1 && day>31|| monthNumber == 3 && day>31||monthNumber == 5 && day>31||monthNumber == 7 && day>31||monthNumber == 8 && day>31||monthNumber == 10 && day>31||monthNumber == 12 && day>31){
           help = monthNumber;
           printedDays[index] = printedDays[index] - 31;
           }
           else{
           if(monthNumber == 4 && day>30|| monthNumber == 6 && day>30||monthNumber == 9 && day>30||monthNumber == 11 && day>30){
            help = monthNumber;
            printedDays[index] = printedDays[index] - 30;
           }
           else{
                if(monthNumber == 2 && day>28)
                    {
                       help = monthNumber;
                       printedDays[index] = printedDays[index] - 28;
                    }
                    else{
                        help = monthNumber -1;
                }

           }
        
        } 
        if(help == 12){
            monthsNumbers[index] = 0;
        }
        else{
            monthsNumbers[index] = help;
        }

           index++; 
       });

       
      


        let column = printedDays.length/5;


        let table = "<table>";
            for(let i = 0; i<5;i++){
                    table += "<tr>";
                        
                        for(let j = 0; j <column; j++)
                        {
                            let indexOfDay = indexTableHelp + indexOfNumberPlus;
                            table += 
                            "<td>"+
                             "<div > ODĚD</div>"+ 
                             "<div >" +year+" |_______dovoz</div>"+
                            "<table style=''>"+ 
                                "<td style='text-align: center; font-size:1.4em; width:35px; border-collapse: collapse; border: 0px; height: 50px'>"+ days[i] +"</td>"+
                                "<td style='text-align: center; width:70px; border-collapse: collapse; border: 0px; height: 50px'>"+months[monthsNumbers[indexOfDay]]+    "<br>Kalasová <br>  Stravování"+"</td>"
                                +"<td style='text-align: center; font-size:1.4em; width:35px; border-collapse: collapse; border: 0px; height: 50px'>"+printedDays[indexOfDay]+"</td>"
                                +"</table>"+



                             "</td>";
                            indexOfNumberPlus += 5;
                        }

                    table += "</tr>";
                    indexOfNumberPlus = 0;
                    indexTableHelp++;
            }

        table += "</table>";


        document.getElementById("MealTicket0").innerHTML = table;
        document.getElementById("MealTicket1").innerHTML = table;
        
    }
    function Print()
{
    window.print();
}

</script>
<body onload="GenMealTicket()">
<?php include("nav.php"); ?>
    <div id="obalovaci">
        <div id="backgroundBlock">
    <h1>Tisk stravenek</h1>
        <form name="controls" id="controls">

            <table>
                <tr>
                    <td>
                        Počáteční den
                    </td>
                    <td>
                        <input type="number" name="Start" value="1" onchange="GenMealTicket()">
                    </td>
                </tr>

                <tr>
                    <td>
                        Končný den
                    </td>
                    <td>
                        <input type="number" name="Stop" value="31" onchange="GenMealTicket()">
                    </td>
                </tr>

               
                <tr>
                    <td>
                        Měsíc
                    </td>
                    <td>
                        <select name="Month" onchange="GenMealTicket()">
                        <option value="1">Leden</option>
                        <option value="2">Únor</option>
                        <option value="3">Březen</option>
                        <option value="4">Duben</option>
                        <option value="5">Květen</option>
                        <option value="6">Červen</option>
                        <option value="7">Červenec</option>
                        <option value="8">Srpen</option>
                        <option value="9">Září</option>
                        <option value="10">Říjen</option>
                        <option value="11">Listopad</option>
                        <option value="12">Prosinec</option>                      
                        </select>
                    </td>
                </tr> 
                <tr>
                    <td>
                        Rok
                    </td>
                    <td>
                        <input type="number" name="Year" value="2023" onchange="GenMealTicket()">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="button" value="Tisk" onclick="Print()">
                    </td>
                </tr> 

                
            </table>

        </form>


 <div id="MealTicket0"></div>
</div>
 <div id="MealTicket1"></div>
</div>
</body>
</html>