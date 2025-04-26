<?php 

namespace App\Repositories\Interfaces;

use App\DTO\UserDTO;
use Illuminate\Support\Collection;

interface UserRepositoryInterface {
    public function getAllUsers(): Collection;
    public function findUserById(string $id): ?UserDTO;
    public function createUser(UserDTO $userDTO): UserDTO;
    public function updateUser(string $id, UserDTO $userDTO): UserDTO;
    public function deleteUser(string $id): bool;
}

