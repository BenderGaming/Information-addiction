<?php

?>
<html>
<head>

<title>QCM</title>
<!--empêcher le retour en arrière avec le bouton BACK -->
<script type="text/javascript">
function noBack(){window.history.forward()}
  noBack();
  window.onload=noBack;
  window.onpageshow=function(evt){if(evt.persisted)noBack()}
  window.onunload=function(){void(0)}
  
</script> 
</head>
<body bgcolor="#FFFFF2">


<center><table border="1" cellpadding="5" bgcolor="#D5FAB4"><tr><td>Questionaire sur le site</td></tr></table></CENTER><br>


<form method="post" action="f_qcm.php">

<?php


$question[0]="Dates de la legalisation du canbis au Canada ?";
$choix[0]=array("17/10/2018","30/08/2000","01/06/2016","27/02/2000");
$bonne_rep[0]=$choix[0][0];

$question[1]="Numero vert pour combatre les addictions";
$choix[1]=array("1 2 3 4 5 6 7 8 9","0 800 23 13 13","17");
$bonne_rep[1]=$choix[1][1];

$question[2]="Premier pays a avoir legalisé le Canabis ?";
$choix[2]=array("hiver","aout","paramoteur","Urugay");
$bonne_rep[2]=$choix[2][3];

$question[3]="Les jeux d'argent sont il addictif?";
$choix[3]=array("vrai","faux");
$bonne_rep[3]=$choix[3][0];

//----------- fin de la partie à remplir----------------------------------------

$nbquest=sizeof($question);

$score=0;


  if (isset($_POST["retour"])) 
  {
   echo "<BR><CENTER>CORRIGE<BR>(allez consulter votre <a href=\"#sco\">score</a> au bas de cette page)</CENTER><BR>";
  }


for ($i=0;$i<$nbquest;$i++) 
 {
  $a_repondu[$i]=false;
  $nbchoix=sizeof($choix[$i]);
  $no=$i+1;
  echo "<table BORDER=\"1\" WIDTH=\"100%\" BGCOLOR=\"#00FFFF\">";
  echo "<tr>";
  echo "<td COLSPAN=\"$nbchoix\">";
  echo "<center><h3><font color=\"#FF0000\">$no</font></h3></center>";
  echo "<center>$question[$i]</center>";
  echo "</td>";
  echo "</tr>";

  echo "<tr bgcolor=\"#00DFDF\">";


    if (isset($_POST["retour"]))
     {
       if (isset($_POST["bt"][$i])) 
       {
         $bt[$i] = $_POST["bt"][$i];
       }
       else $bt[$i] = "";
     }
     else $bt[$i] = "";

  for ($j=0;$j<$nbchoix;$j++) 
    {
     echo "<td>";
     echo "<center><input TYPE=\"radio\" NAME=\"bt[$i]\" VALUE=\"bt[$j]\" ";
     if ($bt[$i]=="bt[$j]")
       {
        echo "checked";  
        $k=$j;
        $a_repondu[$i] =true; 
       }
     echo ">".$choix[$i][$j]."</center>";
     echo "</td>";

    }
  echo "</tr>";
  echo "<tr bgcolor=\"#FFD5D5\">";
  echo "<td COLSPAN=\"$nbchoix\">";

  if ($a_repondu[$i])
   {
     if ($choix[$i][$k]==$bonne_rep[$i])
        {
       
         $mess[$i]="exact";
         $score++;
        }
     else
       {
        $mess[$i]="non c'est $bonne_rep[$i]";
       }
        echo "<center>".$mess[$i]."</center>";
    }



  echo "</td>";
  echo "</tr>";
  echo "</table>";
  echo "<br>";
  }
if (isset($_POST["retour"]))
 {
  echo "<BR><BR><CENTER><table border=\"1\" cellpadding=\"5\" bgcolor=\"#FFC9AE\"><tr><td><a name=\"sco\">Score : $score/$nbquest</td></tr></table></CENTER>";
 }
else
{
 echo "<INPUT type=\"hidden\" name=\"retour\" value=\"1\">";
 echo "<BR><BR><CENTER><INPUT type=\"submit\" value=\"Confirmer\"></CENTER>";
}
echo '<BR><BR><CENTER><input type="button" value="Réesayer" 
		onclick=document.location.href="f_qcm.php";>';

echo '<BR><BR><CENTER><input type="button" value="Retour a l acceuil" 
		onclick=document.location.href="Index.html";>';
?>
</form>
</body>
</html>
