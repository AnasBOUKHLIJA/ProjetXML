<?php
$scolarite = new DOMDocument;

$scolarite->preserveWhiteSpace = false;
$scolarite->load('database/TP04.xml');
$xpath = new DOMXPath($scolarite);
$query = '//Enseignants/Enseignant';
$Enseignants = $xpath->query($query);


if (isset($_POST['enseignant'])) {
    print_r($_POST);
    $file = 'database/TP04.xml';
    $xml = simplexml_load_file($file);
    $Enseignants = $xml->Enseignants;
    $Enseignant = $Enseignants->addChild('Enseignant');
    $Enseignant->addAttribute('Sexe', 'M');
    $Enseignant->addChild('NumSomme', $_POST['NumSomme']);
    $Enseignant->addChild('Cin', $_POST['Cin']);
    $Enseignant->addChild('Prenom', $_POST['Prenom']);
    $Enseignant->addChild('Nom', $_POST['Nom']);
    $Email = $Enseignant->addChild('Email', $_POST['Email']);
    $Email->addAttribute('type', 'personnel');
    $Telephone = $Enseignant->addChild('Telephone', $_POST['Telephone']);
    $Telephone->addAttribute('type', 'portable');
    $Enseignant->addChild('specialite', $_POST['specialite']);
    $Enseignant->addChild('dept', $_POST['dept']);
    $dom = new DOMDocument('1.0');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xml->asXML());
    $dom->save('database/TP04.xml');
    header('location: index.php');
} elseif (isset($_GET['numsomme'])) {
    $xml = simplexml_load_file('database/TP04.xml');
    $target = $xml->xpath('//Enseignants/Enseignant[NumSomme="' . $_GET['numsomme'] . '"]');
    if ($target) {
        $domRef = dom_import_simplexml($target[0]);
        $domRef->parentNode->removeChild($domRef);
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $dom->save('database/TP04.xml');
    }
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <style>
        table {
            width: 100%;
            text-align: center;
            position: relative;
            border: 1px solid #000;
        }
        table th,
        table td {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Table des enseignants
        <?php echo $Enseignants->count(); ?>
    </h1>
    <table border="1">
        <tr>
            <?php foreach ($Enseignants as $Enseignant) {
                $EnseignantInfo = $Enseignant->childNodes;
                foreach ($EnseignantInfo as $item) { ?>
                    <th>
                        <?php echo $item->nodeName ?>
                    </th>
                <?php } ?>
                <th>action</th>
            <?php break;
            } ?>
        </tr>
        <?php foreach ($Enseignants as $Enseignant) { ?>
            <tr>
                <?php
                $EnseignantInfo = $Enseignant->childNodes;
                $numSome = null;
                foreach ($EnseignantInfo as $item) {
                    if ($item->nodeName == 'NumSomme') {
                        $numSome = $item->nodeValue;
                    }
                ?>
                    <td>
                        <?php echo $item->nodeValue ?>
                    </td>
                <?php } ?>
                <td><a href="<?php echo "index.php?numsomme=" . $numSome; ?>">supprimer</a></td>
            </tr>
        <?php } ?>
    </table>
    <div>
        <form method="POST" action="">
            <div><input placeholder="NumSomme" name="NumSomme" /></div>
            <div><input placeholder="Cin" name="Cin" /></div>
            <div><input placeholder="Prenom" name="Prenom" /></div>
            <div><input placeholder="Nom" name="Nom" /></div>
            <div><input placeholder="Email" name="Email" /></div>
            <div><input placeholder="Telephone" name="Telephone" /></div>
            <div><input placeholder="specialite" name="specialite" /></div>
            <div><input placeholder="dept" name="dept" /></div>
            <div><button type="submit" name="enseignant">Ajouter</button>
        </form>
    </div>
</body>

</html>