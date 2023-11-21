CREATE TABLE utilisateurs (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    email VARCHAR(255),
    mdp VARCHAR(255),
    adresse VARCHAR(255),
    telephone VARCHAR(20),
    isAdmin BOOLEAN
);

CREATE TABLE categories (
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    Description TEXT
);

CREATE TABLE produits (
    id_produit INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    description TEXT,
    prix DECIMAL(10, 2),
    quantite INT,
    image VARCHAR(255),
    misEnAvant BOOLEAN,
    id_categorie INT NULL,
    FOREIGN KEY (id_categorie) REFERENCES categories(id_categorie) ON DELETE SET NULL
);

CREATE TABLE panier (
    id_panier INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    created_at DATETIME,
    FOREIGN KEY (id_user) REFERENCES utilisateurs(id_user)
);

CREATE TABLE commandes (
    id_commande INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    date_commande DATETIME,
    statut VARCHAR(50),
    total DECIMAL(10, 2),
    FOREIGN KEY (id_user) REFERENCES utilisateurs(id_user)
);

CREATE TABLE details_de_commande (
    id_detail INT AUTO_INCREMENT PRIMARY KEY,
    id_commande INT,
    id_produit INT,
    quantite INT,
    prix DECIMAL(10, 2),
    FOREIGN KEY (id_commande) REFERENCES commandes(id_commande),
    FOREIGN KEY (id_produit) REFERENCES produits(id_produit)
);

CREATE TABLE panier_produits (
    id_panier INT,
    id_produit INT,
    FOREIGN KEY (id_panier) REFERENCES panier(id_panier),
    FOREIGN KEY (id_produit) REFERENCES produits(id_produit)
);