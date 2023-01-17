<?php
class LangueController
{
    static $langue = array(
        'francais' => array(
            'sidebar' => array(
                'Accueil',
                'Profile',
                'Permission',
                'Departements',
                'ajouter un departement',
                'Filieres',
                'Ajouter une filiere',
                'Agents scolarité',
                'Ajouter un Agent scolarité',
                'Professeurs',
                'Ajouter un Professeur',
                'Etudiants',
                'Ajouter un etudiant',
            ),
            'profil' => array(
                'Mon profil',
                'Numéro de Somme',
                'Departement',
                'Cne',
                'Filiere',
                'Nom',
                'Prenom',
                'Cin',
                'Email',
                'Telephone'
            ),
            'departements' => array(
                'Nos departements',
                'Chef Departement',
                'Nombre de filieres',
                'Nombre de professeurs',
                'voire les details',
            ),
            'toast' => array(
                'L\'ajout est effectué avec succés',
                'les modifications ont été enregistrés',
                'La suppression est effectuée avec succés',
                'Les informations ne sont pas enregistrées'
            ),
        ),
        'anglais' => array(
            'sidebar' => array(
                'Home',
                'Profile',
                'Permissions',
                'Departments',
                'add a department',
                'majors',
                'Add a major',
                'School agents',
                'Add a school agent',
                'teachers',
                'Add a teacher',
                'Students',
                'Add a student',
            ),
            'profil' => array(
                'My profile',
                'Sum number',
                'Department',
                'Cne',
                'Sector',
                'Last name',
                'First name',
                'Cin',
                'E-mail',
                'Phone number'
            ),
            'departements' => array(
                'Our departments',
                'Head of department',
                'Number of majors',
                'Number of teachers',
                'see the details',
            ),
            'toast' => array(
                '',
                '',
                '',
                ''
            ),
        )
    );
    static public function get($lan,$target){
        if($lan){
            return LangueController::$langue[strtolower($lan)][$target];
        }
        return LangueController::$langue['francais'][$target];
    }
}
