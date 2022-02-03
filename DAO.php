<?php

include_once "connectionDB.php";
require_once "rb.php";

class ImplementerAuteur implements DAOAuteur
{
public function recuperer()
{
    $mesAuteurs = R::findall('auteur');

}

public function recupererparid(int $id_Auteur)
{
    $auteur = R::load('auteur', $id_Auteur);
}

public function ajouter(String $auteur)
{
    $auteurs = R::dispense('auteur');
    $auteurs->auteur = $auteur;
    $id = R::store($auteurs);

}

public function supprimer(int $id_Auteur)
{
    $auteurs = R::load('auteur', $id_Auteur);
    R::trash($auteurs);

}

public function modifier(String $auteur, int $id_Auteur)
{
    $auteurs = R::load('auteur',$id_Auteur);
    $auteurs->auteur = $auteur();
    $id = R::store($auteurs);
}


}

class ImplementerPersonne implements DAOPersonne
{
    public function recuperer()
    {
        $mesPersonnes = R::findAll('personne');

    }

    public function recupererparid(int $id_Personne)
    {
        $personne = R::load('personne', $id_Personne);

    }

    public function ajouterpers(String $nom, String $prenom)
    {
        $personnes = R::dispense("personne");
        $personnes->nom = $nom ;
        $personnes->prenom = $prenom;
        $id = R::store($personnes);

    }

    public function modifierpers(String $nom, String $prenom, int $id_Personne)
    {
        $personnes = R::load("personne", $id_Personne);
        $personnes->nom = $nom ;
        $personnes->prenom = $prenom;
        $id = R::store($personnes);
    }

    public function supprimerpers($id_Personne)
    {
        $personnes = R::load("personne", $id_Personne);
        R::trash($personnes);
    }
    public function affichercollection(int $id_Personne)
    {
        $personne = R::load('personne', $id_Personne);
        $collection = $personne->partagerListeLivre;
    }
    public function ajoutercollection(int $id_Personne, int $id_Livre)
    {
        $livres = R::load('livre', $id_Livre);
        $personnes = R::load('personne', $id_Personne);
        $personnes->partagerListeLivre[] = $livres;
        $id = R::store($personnes);
    }
    public function supprimercollection(int $id_Livre, int $id_Personne)
    {
        $livres = R::load('livre', $id_Livre);
        unset($livres->partagerListePersonnel[$id_Personne]);
        $id = R::store($livres);
    }
}

class ImplementerGenre implements DAOGenre {

    public function recuperer(){
        $mesGenres = R::findAll('genre');
    }
    public function recupererparid(int $id_Genre){

        $genre = R::load('genre', $id_Genre);
    }

    public function ajouter(String $genre){
        $genres = R::dispense('genre');
        $genres->nomGenre = $genre();
        $id = R::store($genres);
    }

    function modifier(String $genre, int $id_Genre){

        $genres = R::load('genre',$id_Genre);
        $genres->nomGenre = $genre();
        $id = R::store($genres);
    }

    public function supprimer(int $id_Genre){
        $genres = R::load('genre',$id_Genre);
        R::trash($genres);
    }
}
class ImplementerLivre implements DAOLivre
{
    public function recuperer()
    {
        $mesLivres = R::findAll('livre');
    }

    public function recupererparid(int $id_Livre)
    {
        $livre = R::load('livre', $id_Livre);
    }

    public function ajouter(String $livre, String $genre, String $nom_genre,String $auteur,String $auteurNom)
    {
        $livres = R::dispense('livre');
        $livres->titre = $livre;

        $genres = R::dispense('genre');
        $genres->nomGenre = $nom_genre;
        $livres->partagerListeGenre[] = $genres;

        $auteurs = R::dispense('auteur');
        $auteurs->nom =  $auteurNom;
        $livres->ProprioListeAuteur[] = $auteurs;

        $id = R::store($livres);
    }
    public function supprimer(int $id_Livre)
    {
        $livres = R::load('livre', $id_Livre);
        R::trash($livres);
    }

    public function modifier($livre, int $id_Livre,String $nom_genre,String $auteur,String $auteurNom)
    {
        $livres = R::load('livre', $id_Livre);
        $genres = R::dispense('genre');
        $auteurs = R::dispense('auteur');

        $livres->titre = $livre();
        $genres->nom_genre = $nom_genre;
        $auteurs->nom = $auteurNom;
        $id = R::store($livres, $genres, $auteurs);
    }
}
