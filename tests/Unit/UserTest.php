<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * Retorna todos os usuários criados.
     *
     * @return void
     */
    public function testGetAllUsers()
    {
        $response = $this->get('/users');
        $response->assertOk();
    }

    /**
     * Cria e retorna um usuário.
     *
     * @return void
     */
    public function testCreateUser()
    {
        $dados = [
            'name' => 'John Doe',
            'password' => 'senha@123',
            'email' => 'john.doe@email.com'
        ];
        $response = $this->json('POST', '/users', $dados);
        $response->assertStatus(201);
        $response->assertJson($dados);
    }
}
