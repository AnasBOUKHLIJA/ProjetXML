<?php

class Personne
{
    static function get($code): array{
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        $Personnes = $CadiAyyad->xpath('//Personnes/Personne[@Code="'.$code.'"]');
        return array(
            'Username' => (string)$Personnes[0]->Username,
            'Password' => (string)$Personnes[0]->Password,
            'Nom' => (string)$Personnes[0]->Nom,
            'Prenom' => (string)$Personnes[0]->Prenom,
            'Cin' => (string)$Personnes[0]->Cin,
            'Email' => (string)$Personnes[0]->Email,
            'Telephone' => (string)$Personnes[0]->Telephone,
            'Photo' => (string)$Personnes[0]->Photo,
            'Sexe' => (string)$Personnes[0]->attributes()->Sexe,
            'Code' => (string)$Personnes[0]->attributes()->Code
        );
    }

    static function Authenticate($username,$password){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        $Personnes = $CadiAyyad->xpath('//Personnes/Personne[Username="'.$username.'" and Password="'.$password.'"]');
        if($Personnes){
            return Personne::get($Personnes[0]->attributes()->Code);
        } else{
            header('location: /ProjetXML/connexion?error');
        }
    }

    static function verifyUsernameIfExist($username){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        $Personnes = $CadiAyyad->xpath('//Personnes/Personne[Username="'.$username.'"]');
        if(count($Personnes) != 0){
            return true;
        }else{
            return false;
        }
    }

    static function add($data){
        $file = 'Database/Database.xml';
        $xml = simplexml_load_file($file);
        $Personnes = $xml->Etablissement->Personnes;
        $Personne = $Personnes->addChild('Personne');
        $Personne->addAttribute('Sexe', $data['sexe']);
        $Personne->addAttribute('Code', $data['Code']);
        $Personne->addChild('Username', $data['username']);
        $Personne->addChild('Password', $data['password']);
        $Personne->addChild('Nom', $data['nom']);
        $Personne->addChild('Prenom', $data['prenom']);
        $Personne->addChild('Cin', $data['cin']);
        $Personne->addChild('Email', $data['email']);
        $Personne->addChild('Telephone', $data['telephone']);
        $Personne->addChild('Photo', Personne::uploaded('IMG-',array('png','jpeg','jpg'),$_FILES['photo']));
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $dom->save($file);
    }

    static function uploaded($type, $all_ex_po, $file)
    {
        $filename = $file["name"];
        $filetmpname = $file["tmp_name"];
        $filerror = $file["error"];
        if ($filerror === 0) {
            $file_ex =  pathinfo($filename, PATHINFO_EXTENSION);
            $file_ex_lc = strtolower($file_ex);
            if (in_array($file_ex_lc, $all_ex_po)) {
                $new_name = uniqid($type, true) . '.' . $file_ex;
                $img_upload_path = 'views/ourAssets/images/upload/' . $new_name;
                move_uploaded_file($filetmpname, $img_upload_path);
                return $img_upload_path;
            }
        }
    }

}