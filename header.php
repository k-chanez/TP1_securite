<?php 
		// empêcher le site d'être incorporé dans un iframe, ce qui peut prévenir les attaques par cliquer-pour-voler.
		header('X-Frame-Options: DENY');
		// supprission de l'en-tête "X-Powered-By" qui peut révéler la version du serveur PHP utilisée.
		header_remove('x-powered-by');
		// définition d'un cookie qui ne permet pas son accès via JavaScript, ce qui peut réduire les risques de vol de cookie.
		header( "Set-Cookie: name=value; HttpOnly" );
		// activation de la protection contre les attaques Cross-Site Scripting (XSS) dans les navigateurs compatibles.
		header("X-XSS-Protection: 1; mode=block");
		// empêcher les navigateurs de détecter automatiquement le type de contenu d'une réponse et d'exécuter du code malveillant.
		header("X-Content-Type-Options: nosniff");
		// définir une politique de sécurité stricte pour le transport (HSTS), qui force les navigateurs à utiliser HTTPS pour charger le site, même si l'utilisateur a tapé une URL HTTP.
		header("Strict-Transport-Security: max-age=31536000; includeSubDomains");
?>