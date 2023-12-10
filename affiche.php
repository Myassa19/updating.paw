<?php
class StudentDatabase {
    protected $pdo;

    public function __construct($host, $dbname, $username, $password) {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getPdo() {
        return $this->pdo;
    }

    public function getRecoursResults() {
        $stmt = $this->pdo->prepare("SELECT students.nom, students.prenom, recours.status
            FROM recours
            LEFT JOIN students ON students.id = recours.id_student");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$studentDatabase = new StudentDatabase("127.0.0.1", "isil", "root", "");
$recoursResults = $studentDatabase->getRecoursResults();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Résultats de Recours</title>
</head>
<body style="background-image:url(images/image4.jpg)">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Your Brand</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <!-- Add other navigation elements here -->
        </ul>
    </div>
</nav>

<div class="container mt-4">
    <h2 class="text-light">Résultats de Recours</h2>

    <!-- Example result card -->
    <?php if (!empty($recoursResults)) : ?>
        <div class="card mt-3">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recoursResults as $result) : ?>
                            <tr>
                                <td><?= $result['nom'] ?></td>
                                <td><?= $result['prenom'] ?></td>
                                <td><?= $result['status'] == 1 ? 'Favorable' : 'Défavorable' ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php else : ?>
        <p>Aucun résultat de recours trouvé.</p>
    <?php endif; ?>
</div>

<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>
