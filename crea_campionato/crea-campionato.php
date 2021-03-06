<?php
	include("../session.php");
	include("../connect_db.php");
    include("../funzioni/home_function.php");
    $id = $_SESSION['id_utente'];
    $num_notifiche = $_SESSION['notifiche'];
    setcookie("crea_camp[id_admin]", $id, 0);
    //prendo alcuni dati dell'utente(in questo caso nome e cognome)
    $utente = get_userdates($id);
    
    foreach($utente as $value){
        $nome = $value['nome'];
        $cognome = $value['cognome'];
        $user .= ucfirst("$nome")." ".ucfirst("$cognome");
        
    }
    
    //prendo username dell'utente in sessione
    $query = "SELECT utente.user FROM utente WHERE id_utente = '$id'";
    $ris = mysql_query($query);
    $vet = mysql_fetch_array($ris);
    $nome_user = $vet['user'];
    setcookie("crea_camp[admin]", $nome_user, 0);
    //prendo le squadra dell'utente che sta creando il campionato (se ne ha)
    
   
    $user_teams = get_teams($id);
    
   
?>
<script language="JavaScript" type="text/JavaScript">


</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Creazione Campionato</title>

<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/style-home.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stili/campo-calcio.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="../stili/menu2.css" />

<link rel="stylesheet" href="../stili/form.css" type="text/css" media="screen" />

<script type="text/javascript" src="../librerie/jquery-1.11.0.min.js"></script> 
<script type="text/javascript" src="../librerie/jquery.validate.js"></script> 
<script type="text/javascript" src="../script/validate_campionato.js"></script>

<script>
$(document).ready(function(){
                  $("#button").click(function(event) {
                                     event.stopPropagation();
                                     
                                     $("#dropdown").toggle();
                                     });
                  $(document).click( function() {
                                    $("#dropdown").hide();
                                    });
                  
                  });
</script>


</head>

<body class="crea-camp-page">
<div id = "cont">
	<div id="top">
		<div id="top-insize">
			<div id="top-logo">
				<a href="../index.php"><img src="../img/4.png" width="100px" height="75px" /></a>
			</div>
			<?php
                echo'<div id = "nome"><div id="nome-inside">'.$user.'</div><img id="button" src="../img/tool3.png" width="22px" height="22px">
                <br><div id="dropdown">
                    <ul id="menu_utente">
                        <a class="user_color" href="../user/modifica.php">
                            <li id="menu_utente">
                                modifica utente
                            </li>
                        </a>
                        <a class="user_color" href="../user/log-out.php">
                            <li id="menu_utente">
                                log out
                            </li>
                        </a>
                    </ul>
                    </div>
                </div>';
				//num notifiche nella variabile $num_notifiche
                if($num_notifiche == 0) echo'<div id = "notifiche">
                <a href="notifiche.php">
                <img id="button" width="26px" height="22px" src = "../img/notifica.png" />
                </a>
                </div>';
                
                else echo'<div id = "notifiche" class = "arrivata"><a href="notifiche.php"><img id="button" width="26px" height="22px" src = "../img/notifica-arrivata.png" /> </a> </div>';
			?>
		</div>
	</div>
	

<div id = "windows">
		<div id="menu">
			<div class="menu-principale-container">
				<ul id="menu-principale" class="menu">
					<li id'"item-1" class="style-item-1">
						<a href="../home.php?var=0"><img src="../img/site_logo/fantapv_white2.png" height="22px" width="22px" style="padding-right:2px;">Home</a>
					</li>
					<li id'"item-1" class="style-item-2">
						<a href="inserisci_formazione.php">Inserisci la formazione</a>
					</li>
					<li id'"item-1" class="style-item-3">
						<a href="#">Crea un Campionato</a>
					</li>
					<li id'"item-1" class="style-item-4">
						<a href="../crea_squadra/crea-squadra.php">Crea una nuova Squadra</a>
					</li>

					<li id'"item-1" class="style-item-6">
						<a href="../notifiche.php">Notifiche</a>
					</li>
					<li id'"item-1" class="style-item-7">
						<a href="documenti.php">Documenti di lega</a>
					</li>
                    <li id'"item-1" class="style-item-8">
                        <a href="../squadre/squadre.php?var=0">Le tue squadre</a>
                    </li>
				</ul>
			</div>
		</div>
<div id = "ul-notizie" class = "camp">
<div id="campo">	<!--decorazioni -->

    <div id = "porta1">
    </div>
    <div id="traversa">
    </div>
    <div id="traversa2">
    </div>
    <div id="mezzos">
    </div>
    <div id="mezzod">
    </div>
    <div id="dischettos">
    </div>
    <div id="dischettod">
    </div>
    <div id="areas">
    </div>
    <div id="areas2">
    </div>
    <div id = "linea">
    </div>
    <div id="centroc">
    </div>
    <div id="centro">
    </div>
    <div id = "porta2">
    </div>
    <div id = "ca">
    </div>
    <div id = "ca" class = "right1">
    </div>
    <div id = "ca" class = "left">
    </div>
    <div id = "ca" class = "right2">
    </div>

</div><!--campo-->
</div><!-- ul-notizie -->

<div id = "sotto-wind">
	
		<form action = "salva-camp.php" method = "post" id = "form">

			<div id = "cont-label" class = "nome">
				<label for="nome">Nome del campionato</label>
				<input type = "text" name = "nome" id = "nome" size = "14" class = "crea-camp-nome" autocomplete="off" />
			</div><!--fine cont-label -->

			<div id = "cont-label" class = "password">
				<label for="cognome">Password campionato:<br></label>
				<input type = "password" name = "password" id = "password" size = "14" class = "crea-camp" />
			</div><!--fine cont-label -->

            <div id = "cont-label" class = "squadra">
                <label for="squadra">Seleziona la tua squadra</label>

                    <?php
                        if(!empty($user_teams)){
                            echo'<select class="squadra" name = "squadra">';
                            foreach($user_teams as $value){
                                echo '<option value = "'.$value['nome'].'"> '.$value['nome'].' </option>';}
                            echo'</select>';
                        }
                        
                        else echo '<label id="no_team">Prima di creare un campionato devi avere una squadra</label>';
                        
                    ?>

            </div><!--fine cont-label -->

			<div id = "cont-label" class = "admin">
				<label for="admin">Username dell' amministratore:</label>
				<?php
					echo'<input type = "text" name = "admin" id = "admin" size = "16" class = "crea-camp" value='.$nome_user.'  disabled = "true"><br>';
				?>
				
			</div><!--fine cont-label -->

			<div id = "cont-label" class = "n_part">
				<label for="n_part">Numero dei partecipanti:</label>
				<input type = "text" name = "n_part" id = "n_part"  class = "crea-camp-n_part" /><br>
			</div><!--fine cont-label -->



			<input type = "submit" value = "Crea la Lega!" class = "reg-crea-camp" />
		</form>
		

</div> <!--fine sotto-wind -->


</div><!-- fine cont-->






















