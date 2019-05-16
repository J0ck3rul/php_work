<?php

class Model {

    public $msg;
    private $conn;


    public function __construct() {
        $this->conn = $this->connToDB();
    }

    private function connToDB(){
        $mysql = new mysqli (
            'localhost',
            'root',
            '',
            'test2'
        );


        if (mysqli_connect_errno()) {
            die ('Conexiunea a esuat...');
        }

        return $mysql;
    }

    public function getById($id)
    {
        $sql = "SELECT name from periferice where id=".$id;
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo $row['name'];
    }

    public function getAll()
    {
        $result_array = array();

        $sql = "SELECT * FROM PERIFERICE";
        $result = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            array_push($result_array, $row);
        }
        return $result_array;
    }
    
    public function update($nume,$pret,$id){
        if($nume == '')
            $sql = "UPDATE periferice SET pret=".$pret." WHERE id=".$id;
        else
        if($pret == 0)
            $sql = "UPDATE periferice SET name='".$nume."' WHERE id=".$id;
        else
        $sql = "UPDATE periferice SET name='".$nume."', pret=".$pret." WHERE id=".$id;
        if ($this->conn->query($sql) === TRUE) {
            $this->msg = "Record updated successfully";
        } else {
            $this->msg = "Error updating record: " . $this->conn->error;
        }
    }

    public function insert($nume, $pret){
        $sql = "INSERT INTO periferice( name, pret) VALUES ('".$nume."',".$pret.")";
        if (mysqli_query($this->conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
    }

    public function delete($id){
        $sql = "DELETE FROM periferice WHERE id=".$id;

        if ($this->conn->query($sql) === TRUE) {
            $this->msg = "Record deleted successfully";
        } else {
            $this->msg ="Error deleting record: " . $this->conn->error;
        }
    }

}





class View {

    private $model;



    public function __construct(Model $model) {

        $this->model = $model;

    }



    public function output() {

        echo'<h1>' . $this->model->msg .'</h1>';

    }

    public function printArray($array)
    {
        for($i=0;$i<count($array); $i++){
            echo $array[$i]['name'];
        }
    }


}



class Controller {

    private $model;
    private $view;

    public function __construct(Model $model, View $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function getAll(){
      $result = $this->model->getAll();
      $this->view->printArray($result);
    }

    public function getById($id){
        $this->model->getById($id);
    }

    public function insert($nume,$pret){
        $this->model->insert($nume,$pret);
    }

    public function update($nume,$pret,$id){
        $this->model->update($nume,$pret,$id);
    }

    public function updateNume($nume,$id){
        $this->model->update($nume,0,$id);
    }

    public function updatePret($pret,$id){
        $this->model->update("",$pret,$id);
    }

    public function delete($id){
        $this->model->delete($id);
    }

}



$model = new Model();
$view = new View($model);
$controller = new Controller($model, $view);
// $controller->update("tastatura2",40,1);
// $controller->insert("keyboard", 30);
$controller->getAll();

// $view->output();