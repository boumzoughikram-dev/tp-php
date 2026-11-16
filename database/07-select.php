<?php

require_once "06-connexion.php";

$sql = "SELECT * FROM products";

$statement = $pdo->query($sql);

$products = $statement->fetchAll(
    PDO::FETCH_ASSOC
);

?>

<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>Catalogue des produits</title>

</head>

<body>

    <h1>Catalogue des produits</h1> 

    <?php if (count($products) > 0) { ?>

      
        <table border="1" cellpadding="8" cellspacing="0">

            <tr>
                <th>Nom</th>
                <th>Prix (DH)</th>
                <th>Quantité</th>
                <th>Total stock</th> 
            </tr>

            <?php foreach ($products as $product) { ?>

                <tr>
                    
                    <td><?php echo htmlspecialchars($product["name"]); ?></td>
                    <td><?php echo $product["price"]; ?></td>
                    <td><?php echo $product["quantity"]; ?></td>

                   
                    <td><?php echo $product["price"] * $product["quantity"]; ?></td>
                </tr>

            <?php } ?>

        </table>

    <?php } else { ?>

        <p>Aucun produit trouvé.</p>

    <?php } ?>

</body>

</html>