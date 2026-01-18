<?php

namespace Database\Seeders;

use App\Models\Empreendimento;
use App\Models\Foto;
use Illuminate\Database\Seeder;

class EmpreendimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Empreendimento 1 - Residencial Jardim das Flores
        $emp1 = Empreendimento::updateOrCreate(
            ['title' => 'Residencial Jardim das Flores'],
            [
                'descricao' => '<p>O <strong>Residencial Jardim das Flores</strong> é um empreendimento moderno localizado em uma das áreas mais valorizadas de Natal. Com apartamentos de 2 e 3 quartos, oferece o equilíbrio perfeito entre conforto e praticidade.</p><p>O condomínio conta com área de lazer completa, incluindo piscina adulto e infantil, academia equipada, salão de festas e playground.</p>',
                'tipo' => 'apartamento',
                'area' => 72,
                'quartos' => 2,
                'cidade' => 'Natal',
                'rua' => 'Av. Engenheiro Roberto Freire',
                'numero' => '2500',
                'estado' => 'RN',
                'valor' => 320000,
                'destaque_home' => true,
                'tags' => ['Piscina', 'Academia', 'Salão de Festas', 'Playground', 'Portaria 24h'],
                'foto_capa' => 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=800',
                'foto_planta' => 'https://images.unsplash.com/photo-1574362848149-11496d93a7c7?w=800',
            ]
        );

        Foto::updateOrCreate(
            ['empreendimento_id' => $emp1->id, 'sub_title' => 'Sala de estar'],
            ['file_name' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=800']
        );

        Foto::updateOrCreate(
            ['empreendimento_id' => $emp1->id, 'sub_title' => 'Cozinha integrada'],
            ['file_name' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=800']
        );

        // Empreendimento 2 - Ville Beira Mar
        $emp2 = Empreendimento::updateOrCreate(
            ['title' => 'Ville Beira Mar'],
            [
                'descricao' => '<p>Viva a poucos passos da praia no <strong>Ville Beira Mar</strong>! Apartamentos de alto padrão com vista para o mar, acabamento premium e localização privilegiada em Ponta Negra.</p><p>Infraestrutura completa com piscina infinity, spa, espaço gourmet e muito mais.</p>',
                'tipo' => 'apartamento',
                'area' => 95,
                'quartos' => 3,
                'cidade' => 'Natal',
                'rua' => 'Rua Francisco Gurgel',
                'numero' => '8800',
                'estado' => 'RN',
                'valor' => 580000,
                'destaque_home' => true,
                'tags' => ['Vista Mar', 'Piscina', 'Spa', 'Espaço Gourmet', 'Elevador', 'Varanda Gourmet'],
                'foto_capa' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=800',
                'foto_planta' => 'https://images.unsplash.com/photo-1574362848149-11496d93a7c7?w=800',
            ]
        );

        Foto::updateOrCreate(
            ['empreendimento_id' => $emp2->id, 'sub_title' => 'Fachada do prédio'],
            ['file_name' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=800']
        );

        Foto::updateOrCreate(
            ['empreendimento_id' => $emp2->id, 'sub_title' => 'Área de lazer'],
            ['file_name' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=800']
        );

        // Empreendimento 3 - Condomínio Solar do Vale
        Empreendimento::updateOrCreate(
            ['title' => 'Condomínio Solar do Vale'],
            [
                'descricao' => '<p>O <strong>Condomínio Solar do Vale</strong> oferece casas espaçosas em um ambiente tranquilo e seguro. Perfeito para quem busca qualidade de vida sem abrir mão da proximidade com o centro.</p><p>Casas com 3 quartos sendo 1 suíte, quintal privativo e 2 vagas de garagem.</p>',
                'tipo' => 'casa',
                'area' => 120,
                'quartos' => 3,
                'cidade' => 'Parnamirim',
                'rua' => 'Rua das Acácias',
                'numero' => '150',
                'estado' => 'RN',
                'valor' => 420000,
                'destaque_home' => true,
                'tags' => ['Quintal', 'Garagem Coberta', 'Churrasqueira', 'Pet Friendly'],
                'foto_capa' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=800',
                'foto_planta' => 'https://images.unsplash.com/photo-1574362848149-11496d93a7c7?w=800',
            ]
        );

        // Empreendimento 4 - Loteamento Cidade Nova
        Empreendimento::updateOrCreate(
            ['title' => 'Loteamento Cidade Nova'],
            [
                'descricao' => '<p>Terrenos a partir de 200m² no <strong>Loteamento Cidade Nova</strong>. Infraestrutura completa com água, energia, esgoto e ruas asfaltadas.</p><p>Localização estratégica com fácil acesso às principais vias da cidade. Condições facilitadas de pagamento!</p>',
                'tipo' => 'terreno',
                'area' => 200,
                'quartos' => 0,
                'cidade' => 'São Gonçalo do Amarante',
                'rua' => 'Av. Principal',
                'numero' => 'Lote 1 ao 50',
                'estado' => 'RN',
                'valor' => 85000,
                'destaque_home' => false,
                'tags' => ['Infraestrutura Completa', 'Documentação OK', 'Financiamento Próprio'],
                'foto_capa' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800',
            ]
        );

        // Empreendimento 5 - Business Center Corporate
        Empreendimento::updateOrCreate(
            ['title' => 'Business Center Corporate'],
            [
                'descricao' => '<p>Salas comerciais modernas no <strong>Business Center Corporate</strong>, o novo centro de negócios de Natal. Localização nobre no bairro de Lagoa Nova, próximo a hospitais, bancos e centros comerciais.</p><p>Salas de 30m² a 60m² com opção de junção. Prédio com elevadores, estacionamento rotativo e segurança 24h.</p>',
                'tipo' => 'comercial',
                'area' => 45,
                'quartos' => 0,
                'cidade' => 'Natal',
                'rua' => 'Av. Senador Salgado Filho',
                'numero' => '3000',
                'estado' => 'RN',
                'valor' => 195000,
                'destaque_home' => false,
                'tags' => ['Elevador', 'Estacionamento', 'Ar Condicionado', 'Portaria 24h'],
                'foto_capa' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800',
            ]
        );

        $this->command->info('✅ 5 empreendimentos de exemplo criados com sucesso!');
    }
}
