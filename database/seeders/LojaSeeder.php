<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LojaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lojas')->insert([
            'nome_loja' => 'Mr.Burger',
            'logotipo' => 'img/bua3.png',
            'texto_sobre_restaurante' => 'Bem-vindo ao Mr. Burger, onde a paixão por hambúrgueres é levada a um novo patamar! Fundado em 2020, nosso restaurante nasceu do desejo de criar experiências gastronômicas únicas, combinando ingredientes frescos e de alta qualidade com um ambiente acolhedor e moderno.

No Mr. Burger, acreditamos que um bom hambúrguer vai além de um simples lanche. Nossa missão é proporcionar aos nossos clientes uma explosão de sabores em cada mordida. Utilizamos apenas os melhores cortes de carne, temperos especiais e pães artesanais, garantindo que cada hambúrguer seja uma verdadeira obra-prima culinária.
Tudo começou com dois amigos, amantes de hambúrgueres, que decidiram transformar sua paixão em um negócio. Após inúmeras pesquisas e testes de receitas, abriram o primeiro Mr. Burger em um pequeno bairro da cidade. O sucesso foi imediato, e em pouco tempo, conquistamos o coração de milhares de clientes.

No Mr. Burger, cada cliente é parte da nossa história. Venha nos visitar e descubra porque somos mais do que apenas um restaurante de hambúrgueres – somos uma família que compartilha uma paixão em comum. Agradecemos por escolher o Mr. Burger e esperamos vê-lo em breve!

Estamos localizados no coração da cidade, na Rua dos Sabores, 123. Aberto todos os dias da semana, das 11h às 23h.',

            'imagem_sobre_restaurante' => 'img/img-restaurante.jpg',

            'texto_politica_privacidade' => 'Política de Privacidade do Mr. Burger
A Mr. Burger, doravante denominada "nós", preza pela transparência e pela proteção dos dados dos nossos clientes. Esta Política de Privacidade explica como coletamos, usamos, protegemos e divulgamos suas informações quando você utiliza nosso site.

Informações Coletadas
Ao visitar nosso site, podemos coletar informações pessoais que você nos fornece voluntariamente, como nome, endereço de e-mail, número de telefone e preferências de alimentação.

Uso das Informações
Utilizamos as informações coletadas para personalizar sua experiência no site, processar pedidos, melhorar nossos produtos e serviços, enviar informações sobre promoções e atualizações relevantes, e para fins de análise e pesquisa.

Proteção de Dados
Tomamos medidas adequadas para proteger suas informações contra acesso não autorizado, alteração, divulgação ou destruição não autorizada. Utilizamos protocolos de segurança e procedimentos rigorosos para garantir a proteção de suas informações pessoais.

Compartilhamento de Informações
Não vendemos, comercializamos ou transferimos suas informações pessoais para terceiros sem o seu consentimento, exceto quando necessário para fornecer os serviços solicitados ou exigido por lei.

Cookies e Tecnologias Semelhantes
Nosso site utiliza cookies e tecnologias semelhantes para melhorar a sua experiência online, coletar informações e rastrear padrões de uso do site. Você pode controlar o uso de cookies nas configurações do seu navegador.

Links para Sites de Terceiros
Nosso site pode conter links para sites de terceiros. Não nos responsabilizamos pelas práticas de privacidade desses sites. Recomendamos a leitura das políticas de privacidade de cada site visitado.

Alterações na Política de Privacidade
Reservamo-nos o direito de atualizar ou modificar esta Política de Privacidade a qualquer momento. As alterações serão publicadas nesta página e a data de revisão será atualizada para refletir as mudanças feitas.
',
            'regras_cupons' => 'Regras para Utilização de Cupons na Mr. Burger
Prezado cliente, Na Mr. Burger, valorizamos sua preferência e estamos felizes em oferecer cupons especiais para tornar sua experiência conosco ainda mais satisfatória. Para garantir o uso adequado dos nossos cupons promocionais, é importante observar as seguintes diretrizes:

Privacidade
Utilizamos as informações coletadas para personalizar sua experiência no site, processar pedidos, melhorar nossos produtos e serviços, enviar informações sobre promoções e atualizações relevantes, e para fins de análise e pesquisa.

Apresentação do Cupom:
Para resgatar o desconto, apresente o cupom físico ou digital no momento da compra. Se o cupom exigir um código, certifique-se de inseri-lo corretamente durante o processo de pagamento.

Restrições de Uso:
Para resgatar o desconto, apresente o cupom físico ou digital no momento da compra. Se o cupom exigir um código, certifique-se de inseri-lo corretamente durante o processo de pagamento, não vendemos, comercializamos ou transferimos suas informações pessoais para terceiros sem o seu fornecer os serviços solicitados ou exigido por lei.

Uso Único:
A maioria dos cupons é de uso único e não pode ser combinada com outras ofertas ou promoções, a menos que expressamente indicado.

Cupons Não Cumulativos:
Cupons promocionais não são cumulativos e não podem ser trocados por dinheiro ou utilizados retroativamente em compras anteriores.

Direito de Alteração:
A Mr. Burger reserva-se o direito de modificar, suspender ou encerrar a oferta de cupons promocionais a qualquer momento, sem aviso prévio e lembramos que nossos cupons são oferecidos como cortesia aos nossos clientes e visam proporcionar uma experiência mais vantajosa em nossos produtos. Estamos à disposição para esclarecer quaisquer dúvidas relacionadas aos cupons ou aos nossos produtos e serviços. Agradecemos por escolher a Mr. Burger e esperamos recebê-lo em nossas lojas em breve para desfrutar de nossas deliciosas opções gastronômicas. Atenciosamente, Equipe Mr. Burger.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
