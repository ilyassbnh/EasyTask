<?php
class TaskController extends Controller {
    public function index() {
        $taskModel = $this->model('Task');
        $data = $taskModel->getTasks();
        $this->view('tasks/index', $data);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $taskModel = $this->model('Task');
            $data = [
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'category' => trim($_POST['category']),
                'priority' => trim($_POST['priority'])
            ];
            if ($taskModel->createTask($data)) {
                header('Location: ' . URLROOT . '/tasks');
            } else {
                die('Something went wrong');
            }
        } else {
            $this->view('tasks/create');
        }
    }

    public function edit($id) {
        $taskModel = $this->model('Task');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'category' => trim($_POST['category']),
                'priority' => trim($_POST['priority'])
            ];
            if ($taskModel->updateTask($data)) {
                header('Location: ' . URLROOT . '/tasks');
            } else {
                die('Something went wrong');
            }
        } else {
            $data = $taskModel->getTaskById($id);
            $this->view('tasks/edit', $data);
        }
    }

    public function delete($id) {
        $taskModel = $this->model('Task');
        if ($taskModel->deleteTask($id)) {
            header('Location: ' . URLROOT . '/tasks');
        } else {
            die('Something went wrong');
        }
    }
}
?>
