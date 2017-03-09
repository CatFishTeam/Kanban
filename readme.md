## Fonctionnalités à ajouter :
- Creation Note (Modal Bootstrap ?)
- Edition Note
- Comment

## TO DO
 - Afficher seulement ceux qui ne sont pas déjà dans le kanban
 - Envoi Mail quand ajout liste
 - Clean Connexion
 - Clean Route (If Auth::check() : Laravel -> home ?)
 - Doublon in pivot table
 if (!$cart->items->contains($newItem->id)) {
     $cart->items()->save($newItem);
 }