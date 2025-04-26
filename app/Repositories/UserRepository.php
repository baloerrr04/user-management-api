<?php 

namespace App\Repositories;

use App\Models\User;
use App\DTO\UserDTO;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserRepositoryInterface
{

    public function getAllUsers(): Collection
    {
        return User::all()->map(function ($user) {
            return UserDTO::fromArray($user->toArray());
        });
    }

    public function findUserById(string $id): ?UserDTO
    {
        $user = User::find($id);
        
        if (!$user) {
            Log::warning("User not found with ID: {$id}");
            return null;
        }

        return UserDTO::fromArray($user->toArray());
    }

    public function createUser(UserDTO $userDTO): UserDTO
    {
        $user = User::create($userDTO->toArray());
        
        Log::info("User created", ['user_id' => $user->id]);
        
        return UserDTO::fromArray($user->toArray());
    }

    public function updateUser(string $id, UserDTO $userDTO): UserDTO
    {
        $user = User::findOrFail($id);
        
        $user->update($userDTO->toArray());
        
        Log::info("User updated", ['user_id' => $id]);
        
        return UserDTO::fromArray($user->toArray());
    }

    public function deleteUser(string $id): bool
    {
        $user = User::findOrFail($id);
        
        $deleted = $user->delete();
        
        Log::info("User deleted", ['user_id' => $id]);
        
        return $deleted;
    }
}