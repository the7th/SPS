<?php

// this is a place where I put all the functions for SPS

class SPS {

    public function db(){
        $db = new PDO('mysql:host=localhost;dbname=sa2;charset=utf8mb4','root','root');
        return $db;
    }

    public function getNumOfStudents(){
        $db = $this->db();

        $stmt = $db->query('SELECT COUNT(StudentID) as numOfStudents FROM student');
        $result = $stmt->fetch();

        return $result['numOfStudents'];
    }

    public function getNumOfTeachers(){
        $db = $this->db();

        $role = 'teacher';

        $stmt = $db->prepare('SELECT COUNT(id) as numOfTeachers FROM users WHERE role=:role');
        $stmt->bindParam(':role', $role);
        $result = $stmt->fetch();

        return $result['numOfTeachers'];
    }

    public function getHighestGrade(){

    }

    public function getAvgGrade(){

    }

    public function getLowestGrade(){

    }

    public function getAllStudents(){

    }

    public function getSpecificStudents(){

    }

    public function getAllClass(){
        
    }

    public function getSpecificClass(){

    }


}