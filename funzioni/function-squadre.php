<?php

    function get_teamsname($id){
        $query = "SELECT squadra.nome, squadra.id_squadra FROM squadra WHERE squadra.id_utente = '$id'";
        $ris = mysql_query($query);
        
        while($row = mysql_fetch_array($ris)){
        $squadre[] = array(
                    "nome" => $row['nome'],
                    "id_squadra" => $row['id_squadra']
                         );
        }
        return $squadre;
    
        
        
    }
    

    function get_datisquadra($nome_squadra){
    
        $query = "SELECT squadra.id_squadra, squadra.nome, squadra.id_stadio, squadra.id_campionato, squadra.iscritta, squadra.storia, squadra.logo, squadra.nome_stadio FROM squadra WHERE squadra.nome = '$nome_squadra'";
        $ris = mysql_query($query);
        $row = mysql_fetch_array($ris);
        
        $dati[] = array(
                "nome" => $row['nome'],
                "logo" => $row['logo'],
                "id_camp" => $row['id_campionato'],
                "id_stadio" => $row['id_stadio'],
                "storia" => $row['storia'],
                "stadio" => $row['nome_stadio'],
                "iscritta" => $row['iscritta'],
                "id_squadra" => $row['id_squadra']
                
                      );
        return $dati;
        
        
    }
    
    function get_datisquadraId($id){
        
        $query = "SELECT  squadra.nome, squadra.id_stadio, squadra.id_campionato, squadra.iscritta, squadra.storia, squadra.logo, squadra.nome_stadio FROM squadra WHERE squadra.id_squadra = '$id'";
        $ris = mysql_query($query);
        $row = mysql_fetch_array($ris);
        
        $dati[] = array(
                        "nome" => $row['nome'],
                        "logo" => $row['logo'],
                        "id_camp" => $row['id_campionato'],
                        "id_stadio" => $row['id_stadio'],
                        "storia" => $row['storia'],
                        "stadio" => $row['nome_stadio'],
                        "iscritta" => $row['iscritta']
                        
                        
                        );
        return $dati;
        
        
    }

    function get_squadradate_first($id){
        $query = "SELECT squadra.id_squadra, squadra.nome, squadra.id_stadio, squadra.id_campionato, squadra.iscritta, squadra.storia, squadra.logo, squadra.nome_stadio FROM squadra WHERE squadra.id_utente = '$id'";
        $ris = mysql_query($query);
        $row = mysql_fetch_array($ris);
        
        $dati[] = array(
                      "nome" => $row['nome'],
                      "logo" => $row['logo'],
                      "id_camp" => $row['id_campionato'],
                      "id_stadio" => $row['id_stadio'],
                      "storia" => $row['storia'],
                      "stadio" => $row['nome_stadio'],
                      "iscritta" => $row['iscritta'],
                      "id_squadra" => $row['id_squadra']
                      
                      );
        return $dati;
        
        
        
        
    }
    function get_id_camp_by_id_team($id_team){
        $query = "SELECT squadra.id_campionato FROM squadra WHERE squadra.id_squadra = '$id_team'";
        $ris = mysql_query($query);
        $vet = mysql_fetch_array($ris);
        return $vet['id_campionato'];
    }















