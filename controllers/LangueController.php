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
            )
        ),
        'anglais' => array(
            'sidebar' => array(
                'Profile',
                'Permission',
                'Departments',
                'add a department',
                'Sectors',
                'Add a sector',
                'School agents',
                'Add an Education Agent',
                'teachers',
                'Add a Teacher',
                'Students',
                'Add a student',
            )
        )
    );
    static public function get( $lan,$target){
        return LangueController::$langue[strtolower($lan)][$target];
    }
}