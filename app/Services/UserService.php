<?php 

namespace App\Services;

use App\DTO\UserDTO;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;

class UserService implements UserServiceInterface
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers(): Collection
    {
        return $this->userRepository->getAllUsers();
    }

    public function findUserById(string $id): ?UserDTO
    {
        return $this->userRepository->findUserById($id);
    }

    public function createUser(array $data): UserDTO
    {
        $userDTO = UserDTO::fromArray($data);
        return $this->userRepository->createUser($userDTO);
    }

    public function updateUser(string $id, array $data): UserDTO
    {
        $existingUser = $this->findUserById($id);
        
        if (!$existingUser) {
            throw new \Exception("User not found");
        }

        $mergedData = array_merge($existingUser->toArray(), $data);
        $mergedData['id'] = $id;

        $userDTO = UserDTO::fromArray($mergedData);
        return $this->userRepository->updateUser($id, $userDTO);
    }

    public function deleteUser(string $id): bool
    {
        return $this->userRepository->deleteUser($id);
    }
}