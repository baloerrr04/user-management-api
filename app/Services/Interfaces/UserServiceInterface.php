<?php 

namespace App\Services\Interfaces;

use App\DTO\UserDTO;
use Illuminate\Support\Collection;

interface UserServiceInterface
{
    public function getAllUsers(): Collection;
    public function findUserById(string $id): ?UserDTO;
    public function createUser(array $data): UserDTO;
    public function updateUser(string $id, array $data): UserDTO;
    public function deleteUser(string $id): bool;
}