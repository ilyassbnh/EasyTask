<?php
class Task {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getTasks() {
        $this->db->query('SELECT * FROM tasks');
        return $this->db->resultSet();
    }

    public function getTaskById($id) {
        $this->db->query('SELECT * FROM tasks WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function createTask($data) {
        $this->db->query('INSERT INTO tasks (title, description, category, priority) VALUES(:title, :description, :category, :priority)');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':priority', $data['priority']);
        return $this->db->execute();
    }

    public function updateTask($data) {
        $this->db->query('UPDATE tasks SET title = :title, description = :description, category = :category, priority = :priority WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':priority', $data['priority']);
        return $this->db->execute();
    }

    public function deleteTask($id) {
        $this->db->query('DELETE FROM tasks WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
?>
