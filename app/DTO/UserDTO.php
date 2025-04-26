<?php

namespace App\DTO;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserDTO
{

    public string $id;
    public string $name;
    public string $email;
    public int $age;

    public static function fromArray(array $data): self
    {
        $validator = Validator::make(
            $data,
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . ($data['id'] ?? 'NULL'),
                'age' => 'required|integer|min:0|max:120',
            ],
            [
                // Custom error messages
                'name.required' => 'Name is mandatory',
                'email.required' => 'Email is mandatory',
                'email.email' => 'Invalid email format',
                'age.required' => 'Age is mandatory',
                'age.integer' => 'Age must be a number',
                'age.min' => 'Minimum age is 0',
                'age.max' => 'Maximum age is 120',
            ]
        );

        // Throw validation exception if fails
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $dto = new self();
        $dto->id = $data['id'] ?? '';
        $dto->name = $data['name'];
        $dto->email = $data['email'];
        $dto->age = $data['age'];

        return $dto;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'age' => $this->age,
        ];
    }
}
