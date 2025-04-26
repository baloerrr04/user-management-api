<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 *     title="User Management API",
 *     version="1.0.0",
 *     description="Comprehensive API for managing user data with full CRUD functionality",
 *     @OA\Contact(
 *         email="support@example.com",
 *         name="API Support Team"
 *     )
 * )
 * @OA\Server(
 *     url="/api",
 *     description="Main API Endpoint"
 * )
 * @OA\Schema(
 *     schema="UserResource",
 *     type="object",
 *     @OA\Property(property="id", type="string", example="uuid-123-456"),
 *     @OA\Property(property="name", type="string", example="John Doe"),
 *     @OA\Property(property="email", type="string", example="john.doe@example.com"),
 *     @OA\Property(property="age", type="integer", example=30)
 * )
 * @OA\Schema(
 *     schema="ErrorResponse",
 *     type="object",
 *     @OA\Property(property="success", type="boolean", example=false),
 *     @OA\Property(property="message", type="string", example="Validation failed"),
 *     @OA\Property(
 *         property="errors",
 *         type="object",
 *         @OA\AdditionalProperties(
 *             type="array",
 *             @OA\Items(type="string")
 *         )
 *     )
 * )
 */
class OpenAPIController extends Controller
{
    // Kontroller dokumentasi utama
}