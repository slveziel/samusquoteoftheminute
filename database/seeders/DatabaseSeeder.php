<?php

namespace Database\Seeders;

use App\Models\Quote;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Criar usuário admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@samus.com',
            'password' => Hash::make('123a45b'),
        ]);

        // Quotes iniciais
        $quotes = [
            ['text' => 'A persistência é o caminho do êxito.', 'author' => 'Charles Chaplin'],
            ['text' => 'O sucesso nasce do querer, da determinação e persistência em se chegar a um objetivo.', 'author' => 'José de Alencar'],
            ['text' => 'Não espere por uma crise para descobrir o que é importante em sua vida.', 'author' => 'Platão'],
            ['text' => 'A vida é como andar de bicicleta. Para manter o equilíbrio, você deve continuar se movendo.', 'author' => 'Albert Einstein'],
            ['text' => 'O único lugar onde o sucesso vem antes do trabalho é no dicionário.', 'author' => 'Vidal Sassoon'],
            ['text' => 'Acredite em você mesmo e tudo será possível.', 'author' => 'Desconhecido'],
            ['text' => 'O fracasso é a semente do sucesso.', 'author' => 'Provérbio Chinês'],
            ['text' => 'Grandes conquistas não são feitas por impulso, mas por uma soma de pequenas realizações.', 'author' => 'Vincent Van Gogh'],
            ['text' => 'A excelência não é um destino, mas uma jornada contínua.', 'author' => 'Zig Ziglar'],
            ['text' => 'Seu tempo é limitado, não desperdice vivendo a vida de outra pessoa.', 'author' => 'Steve Jobs'],
        ];

        foreach ($quotes as $quote) {
            Quote::create($quote);
        }
    }
}
