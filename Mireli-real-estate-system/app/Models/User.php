<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Owned by Pair 1. One table, one login, and a `role` column decides what a
 * person may do: client, management or admin.
 *
 * `role` is fillable so seeders can create staff accounts. Never pass
 * request()->all() into User::create(); registration sets the role itself.
 */
#[Fillable(['name', 'email', 'phone', 'role', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    public const ROLE_CLIENT = 'client';
    public const ROLE_MANAGEMENT = 'management';
    public const ROLE_ADMIN = 'admin';

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isClient(): bool
    {
        return $this->role === self::ROLE_CLIENT;
    }

    public function isManagement(): bool
    {
        return $this->role === self::ROLE_MANAGEMENT;
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    /** Route name of this person's own dashboard. */
    public function dashboardRoute(): string
    {
        return match ($this->role) {
            self::ROLE_ADMIN => 'admin.dashboard',
            self::ROLE_MANAGEMENT => 'management.dashboard',
            default => 'client.dashboard',
        };
    }

    // Relationships to the other pairs' models. They only work once those
    // models exist (see the starter pack), so nothing calls them yet.

    public function viewings(): HasMany
    {
        return $this->hasMany(Viewing::class, 'client_id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'client_id');
    }

    public function paymentPlans(): HasMany
    {
        return $this->hasMany(PaymentPlan::class, 'client_id');
    }

    /** Houses this person has reserved or bought. */
    public function properties(): HasMany
    {
        return $this->hasMany(Property::class, 'buyer_id');
    }
}
