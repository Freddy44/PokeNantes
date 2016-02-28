
Pour récupérer les infos user:
  // On récupère le service
  $security = $container->get('security.context');

  // On récupère le token
  $token = $security->getToken();
    // Si la requête courante n'est pas derrière un pare-feu, $token est null

  // Sinon, on récupère l'utilisateur
  $user = $token->getUser();
    // Si l'utilisateur courant est anonyme, $user vaut « anon. »

    // Sinon, c'est une instance de notre entité User, on peut l'utiliser normalement
    $user->getUsername();


Récuperer un user Depuis un contrôleur:

    $user = $this->getUser();
    if (null === $user) {
      // Ici, l'utilisateur est anonyme ou l'URL n'est pas derrière un pare-feu
    } else {
      // Ici, $user est une instance de notre classe User
    }
