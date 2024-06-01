<?php
class Task {
    private $db;
    private $table = 'tasks';

    public function __construct() {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    }

    public function getAllTasks() {
        $stmt = $this->db->prepare("SELECT * FROM " . $this->table);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTasksByUserId($userId) {
        $stmt = $this->db->prepare("SELECT * FROM " . $this->table . " WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($userId, $title, $description, $category, $priority) {
        $stmt = $this->db->prepare("INSERT INTO " . $this->table . " (user_id, title, description, category, priority) VALUES (:user_id, :title, :description, :category, :priority)");
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':priority', $priority);
        return $stmt->execute();
    }

    public function update($id, $title, $description, $category, $priority, $completed) {
        $stmt = $this->db->prepare("UPDATE " . $this->table . " SET title = :title, description = :description, category = :category, priority = :priority, completed = :completed WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':priority', $priority);
        $stmt->bindParam(':completed', $completed);
        return $stmt->execute();
    }
    public function searchTasks($search) {
        $search = "%$search%";
        $stmt = $this->db->prepare("SELECT * FROM " . $this->table . " WHERE title LIKE :search");
        $stmt->bindParam(':search', $search);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchUserTasks($search, $userId) {
        $search = "%$search%";
        $stmt = $this->db->prepare("SELECT * FROM " . $this->table . " WHERE user_id = :user_id AND title LIKE :search");
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':search', $search);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filterTasksByPriority($priority) {
        $stmt = $this->db->prepare("SELECT * FROM " . $this->table . " WHERE priority = :priority");
        $stmt->bindParam(':priority', $priority);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filterUserTasksByPriority($priority, $userId) {
        $stmt = $this->db->prepare("SELECT * FROM " . $this->table . " WHERE user_id = :user_id AND priority = :priority");
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':priority', $priority);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM " . $this->table . " WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function findById($id) {
        $stmt = $this->db->prepare("SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 1");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
