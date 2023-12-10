
<?php

class StudentDatabase {
    private $pdo;

    // Constructor to establish database connection
    public function __construct($host, $dbname, $username, $password) {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    // Method to add a student to the database
    public function addStudent($nom, $prenom, $email, $groupe) {
        $stmt = $this->pdo->prepare("INSERT INTO students (nom, prenom, email, groupe) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nom, $prenom, $email, $groupe]);
    }

    // Method to remove a student from the database by ID
    public function removeStudent($id) {
        $stmt = $this->pdo->prepare("DELETE FROM students WHERE id = ?");
        $stmt->execute([$id]);
    }

    // Method to search for a student by ID
    public function searchStudent($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM students WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

class RecoursManager {
    private $pdo;

    public function __construct($host, $dbname, $username, $password) {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    // Method to add a recours
    public function addRecours($id_student, $module, $nature, $note_affiche, $note_reel) {
        $stmt = $this->pdo->prepare("INSERT INTO recours (id_student, module, nature, note_affiche, note_reel) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$id_student, $module, $nature, $note_affiche, $note_reel]);
    }

    // Method to update the status of a recours
    public function updateRecoursStatus($recoursId, $newStatus) {
        $stmt = $this->pdo->prepare("UPDATE recours SET status = ? WHERE id = ?");
        $stmt->execute([$newStatus, $recoursId]);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assurez-vous que les données du formulaire sont présentes
    if (
        isset($_POST['nom']) &&
        isset($_POST['prenom']) &&
        isset($_POST['email']) &&
        isset($_POST['Groupe'])
    ) {
        // Récupérer les données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $groupe = $_POST['Groupe'];

        // Créer une instance de la classe StudentDatabase
        $studentDatabase = new StudentDatabase("127.0.0.1", "isil", "root", "");
        $studentDatabase->addStudent($nom, $prenom, $email, $groupe);
        echo "Student added successfully!";
    } else if (
        isset($_POST['ID']) &&
        isset($_POST['MODULE']) &&
        isset($_POST['NATURE']) &&
        isset($_POST['NOTE-AFFICHE']) &&
        isset($_POST['NOTE-REEL'])
    ) {
        $id = $_POST['ID'];
        $module = $_POST['MODULE'];
        $nature = $_POST['NATURE'];
        $noteAffiche = $_POST['NOTE-AFFICHE'];
        $noteReel = $_POST['NOTE-REEL'];


        $recours = new RecoursManager("127.0.0.1", "isil", "root", "");
        $recours->addRecours($id, $module, $nature, $noteAffiche, $noteReel);
        echo "Recours added successfully!";
    } else {
        echo "Error: Incomplete form data.";
    }

}


?>
