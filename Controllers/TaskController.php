<?php
class TaskController {
    private $taskModel;
    private $userModel;

    public function __construct() {
        $this->taskModel = new Task();
        $this->userModel = new User();
    }

    public function index($search = null, $filter = null) {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }
    
        if ($_SESSION['role'] == 'admin') {
            if ($search !== null) {
                $tasks = $this->taskModel->searchTasks($search);
            } elseif ($filter !== null) {
                $tasks = $this->taskModel->filterTasksByPriority($filter);
            } else {
                $tasks = $this->taskModel->getAllTasks();
            }
        } else {
            if ($search !== null) {
                $tasks = $this->taskModel->searchUserTasks($search, $_SESSION['user_id']);
            } elseif ($filter !== null) {
                $tasks = $this->taskModel->filterUserTasksByPriority($filter, $_SESSION['user_id']);
            } else {
                $tasks = $this->taskModel->getTasksByUserId($_SESSION['user_id']);
            }
        }
    
        require_once 'Views/tasks/index.php';
    }
    

    public function create() {
        session_start();
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
            header('Location: index.php?action=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            $priority = $_POST['priority'];
            $userId = $_POST['user_id']; // Retrieve user ID from the form

            $this->taskModel->create($userId, $title, $description, $category, $priority); // Pass user ID to create method
            header('Location: index.php?action=tasks');
            exit;
        } else {
            require_once 'Views/tasks/create.php';
        }
    }

    public function edit($id) {
        session_start();
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
            header('Location: index.php?action=login');
            exit;
        }

        $task = $this->taskModel->findById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            $priority = $_POST['priority'];
            $completed = isset($_POST['completed']) ? 1 : 0;

            $this->taskModel->update($id, $title, $description, $category, $priority, $completed);
            header('Location: index.php?action=tasks');
            exit;
        } else {
            require_once 'Views/tasks/edit.php';
        }
    }

    public function delete($id) {
        session_start();
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
            header('Location: index.php?action=login');
            exit;
        }

        $this->taskModel->delete($id);  
        header('Location: index.php?action=tasks');
        exit;
    }

    public function markComplete($id) {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }

        $task = $this->taskModel->findById($id);

        if ($_SESSION['role'] == 'admin' || $_SESSION['user_id'] == $task['user_id']) {
            $this->taskModel->update($id, $task['title'], $task['description'], $task['category'], $task['priority'], true);
            header('Location: index.php?action=tasks');
            exit;
        } else {
            echo "Vous n'avez pas la permission de compléter cette tâche.";
        }
    }
}
?>
