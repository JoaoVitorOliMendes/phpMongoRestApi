<?php

class UserController {

    private $db;

    public function __construct() {
        $this->db = connectDB::getInstance()->Users;
    }

    public function get($id = null) {
        if(isset($id)) {
            return JsonFormater::encodeArray($this->db->findOne(['_id' => new MongoDB\BSON\ObjectID($id)]));
        }else {
            return JsonFormater::encodeArray($this->db->find());
        }
    }
    public function post() {
        $user = new User(null, null, null, null, null);
        $data = json_decode(file_get_contents('php://input'), true);
        $user->setFirstName($data['firstName']);
        $user->setMiddleName($data['middleName']);
        $user->setEmail($data['email']);
        $user->setPassword($data['password']);
        if(null != $user->getFirstName() || null != $user->getMiddleName() || null != $user->getEmail() || null != $user->getPassword()) {
            $insertOneResult = $this->db->insertOne([
                'firstName' => $user->getFirstName(),
                'middleName' => $user->getMiddleName(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
            ]);
            return json_encode($insertOneResult->getInsertedId());
        }else {
            return json_encode(['error' => '400 - Bad Request']);
        }
    }
    public function put() {
        $user = new User(null, null, null, null, null);
        $data = json_decode(file_get_contents('php://input'), true);
        $user->setId($data['_id']);
        $user->setFirstName($data['firstName']);
        $user->setMiddleName($data['middleName']);
        $user->setEmail($data['email']);
        $user->setPassword($data['password']);
        if(null != $user->getId() || null != $user->getFirstName() || null != $user->getMiddleName() || null != $user->getEmail() || null != $user->getPassword()) {
            $this->db->updateOne([
                '_id' =>  new MongoDB\BSON\ObjectID($user->getId()),
            ], [
                '$set' => [
                    'firstName' => $user->getFirstName(),
                    'middleName' => $user->getMiddleName(),
                    'email' => $user->getEmail(),
                    'password' => $user->getPassword(),
                ]
            ]);
            return $user->getId();
        }else {
            return json_encode(['error' => '400 - Bad Request']);
        }
    }
    public function delete($id) {
        $this->db->deleteOne(['_id' => new MongoDB\BSON\ObjectID($id)]);
        return $id;
    }
}





?>