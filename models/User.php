<?php
class User {
    private ?int $id;
    private ?string $email;
    private ?string $firstname;
    private ?string $lastname;
    private ?string $password;

    public function __construct($id=false, $firstname=false, 
    $lastname=false, $email=false, $password=false) {
        $this->id = $id;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->password = $password;
    }

    
    public function getId(): ?int {
        return $this->id;
    }
    public function setId(int $id) {
        $this->id = $id;
    }
    public function getEmail(): ?string {
        return $this->email;
    }
    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function getFirstname(): ?string {
        return $this->firstname;
    }
    public function setFirstname(string $firstname) {
        $this->firstname = $firstname;
    }
    public function getLastname(): ?string {
        return $this->lastname;
    }
    public function setLastname(string $lastname) {
        $this->lastname = $lastname;
    }
    public function getPassword(): ?string {
        return $this->password;
    }
    public function setPassword(string $password) {
        $this->password = $password;
    }

    public function hashPassword() {
    
        return password_hash($this->password, PASSWORD_DEFAULT);
    }
}