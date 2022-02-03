<?php


interface DAOAuteur {
    public function recuperer(); 
    public function recupererparid(int $id_Auteur); 
    public function ajouter(String $auteur);
    public function supprimer(int $id_Auteur); 
    public function modifier(String $auteur, int $id_Auteur);
}
interface DAOPersonne {
    public function recuperer();
    public function recupererparid(int $id_Personne); 
    public function ajouterpers(String $nom, String $prenom);
    public function supprimerpers(int $id_Personne); 
    public function modifierpers(String $nom, String $prenom, int $id_Personne);
    public function affichercollection(int $id_Personne);
    public function ajoutercollection(int $id_Personne, int $id_Livre);
    public function supprimercollection(int $id_Livre, int $id_Personne); 
}
interface DAOGenre {
    public function recuperer(); 
    public function recupererparid(int $id_Genre); 
    public function ajouter(String $genre);
    function modifier(String $genre, int $id_Genre);
    public function supprimer(int $id_Genre); 
}
interface DAOLivre {
    public function recuperer(); 
    public function recupererparid(int $id_Livre); 
    public function ajouter(String $livre, String $genre, String $nom_genre,String $auteur,String $auteurNom);
    public function supprimer(int $id_Livre); 
    public function modifier($livre, int $id_Livre,String $nom_genre,String $auteur,String $auteurNom);
}

