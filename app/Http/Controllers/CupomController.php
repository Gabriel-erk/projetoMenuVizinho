<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProduto;
use Illuminate\Http\Request;
use App\Models\Cupom;
use App\Models\Produto;
use App\Models\SubCategoria;
// pacote do laravel para manipular datas e horas
use Carbon\Carbon;

class CupomController extends Controller
{

    public function indexView()
    {   
        // retornando todos os cupons juntamente das horas restantes que vão levar para acabar dentro do atributo horas_restates que foi inserido neste momento dentro de $cupom
        // map() é uma função de coleção que permite percorrer todos os itens de uma coleção (cupons) e aplicar uma função a cada item e retornando uma nova coleção com valores transformados (afinal, como uma função é aplicada dentro de cada item, os valores originais serão afetados, ele não afeta a coleção original, mas cria uma nova com os valores modificados)
        // aqui o map percorre cada item em "Cupom" calcula a diferença de horas entre a hora atual e a hora de 'data_expiracao' para cada item, armazena em $cupom->horas_restantes, e então retorna cada item modificado, o resultado é uma coleção nova o atributo horas_restantes adicionado a cada cupom da coleção cupons
        $cupons = Cupom::all()->map(function ($cupom) {
            // Calcula o tempo restante em horas
            // Aqui, diffInHours retorna o número de horas restantes. O segundo parâmetro false permite que o valor seja negativo se a data já tiver expirado, o que pode ser útil para saber se o tempo já passou.
            $cupom->horas_restantes = round(Carbon::now()->floatDiffInHours($cupom->data_expiracao, false));
            return $cupom;
        });;
        return view('cupons', compact('cupons'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cupons = Cupom::all();
        return view('admin.adm.admCupons.index', compact('cupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = CategoriaProduto::all();
        $subCategorias = SubCategoria::all();
        return view('admin.adm.admCupons.cadastro', compact('categorias', 'subCategorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_cupom' => 'required|string|max:50',
            'descricao_cupom' => 'required|string|max:60',
            'data_expiracao' => 'required|date',
            'valor_desconto' => 'required|numeric',
            'tipo_desconto' => 'required|integer',
            'forma_desconto' => 'required|integer',
            'palavras' => 'required_if:forma_desconto,1|array',
            // Validação condicional para categorias e subcategorias
            'categorias' => 'array',
            'sub_categorias' => 'array',
        ]);

        /*
        * Esse bloco de código verifica se a forma_desconto é igual a 2. Se for, ele verifica se não há nenhuma categoria ou subcategoria selecionada. Se nenhuma delas estiver selecionada, o usuário é redirecionado de volta ao formulário com mensagens de erro indicando que pelo menos uma categoria ou subcategoria deve ser escolhida.
         */
        if ($request->forma_desconto == 2 && !$request->hasAny(['categorias', 'sub_categorias'])) {
            return redirect()->back()->withErrors([
                'categorias' => 'É necessário escolher pelo menos uma categoria ou subcategoria.',
                'sub_categorias' => 'É necessário escolher pelo menos uma categoria ou subcategoria.',
            ])->withInput();
        }

        // Cria o cupom
        $cupom = Cupom::create([
            'nome_cupom' => $request->nome_cupom,
            'descricao_cupom' => $request->descricao_cupom,
            'data_expiracao' => $request->data_expiracao,
            'loja_id' => 1,
            'valor_desconto' => $request->valor_desconto,
            'tipo_desconto' => $request->tipo_desconto,
            'forma_desconto' => $request->forma_desconto,
        ]);

        // comandos abaixo associa palavras-chave, categorias e subcategorias (caso selecionadas)

        /*
        * Esse trecho verifica se a forma_desconto é igual a 1 e se o campo palavras foi enviado na requisição. Se ambas as condições forem verdadeiras, ele itera sobre cada palavra-chave recebida e cria uma nova associação no banco de dados, utilizando o método create() para adicionar a palavra-chave correspondente ao cupom. 
        */
        if ($request->forma_desconto == 1 && $request->has('palavras')) {
            foreach ($request->palavras as $palavra) {
                $cupom->palavras()->create(['palavra_chave' => $palavra]);
            }
        }

        /*
        * Esse bloco verifica novamente se a forma_desconto é igual a 2. Se for, ele verifica se há categorias e subcategorias fornecidas. Se existirem, utiliza o método attach() para associar as categorias e subcategorias selecionadas ao cupom.
        * O attach() adiciona as relações na tabela pivô correspondente (neste caso, entre cupons e categorias ou subcategorias), permitindo que um cupom possa estar associado a múltiplas categorias e subcategorias - adiciona os possíveis múltiplos ids de categorias e subcategorias a suas respectivas tabelas (cupon_categoria ou cupon_sub_categoria). 
        */
        if ($request->forma_desconto == 2) {
            if ($request->has('categorias')) {
                $cupom->categorias()->attach($request->categorias);
            }

            if ($request->has('sub_categorias')) {
                $cupom->subCategorias()->attach($request->sub_categorias);
            }
        }

        return redirect()->route('cupom.index')->with('sucesso', 'Cupom cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cupom = Cupom::findOrFail($id);
        return view('admin.adm.admCupons.visualizar', compact('cupom'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cupom = Cupom::findOrFail($id);
        $categorias = CategoriaProduto::all();
        $subCategorias = SubCategoria::all();
        return view('admin.adm.admCupons.editar', compact('cupom', 'categorias', 'subCategorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome_cupom' => 'required|string|max:50',
            'descricao_cupom' => 'required|string|max:60',
            'data_expiracao' => 'required|date',
            'valor_desconto' => 'required|numeric',
            'tipo_desconto' => 'required|integer',
            'forma_desconto' => 'required|integer',
            'palavras' => 'nullable|array',
            // Validação condicional personalizada
            'categorias' => 'nullable|array', // pode ser nullo, e deve ser array quando não for
            'sub_categorias' => 'nullable|array', // pode ser nullo, e deve ser array quando não for
        ]);

        // Verifica se a forma de desconto exige categorias ou subcategorias
        if ($request->forma_desconto == 2 && !$request->hasAny(['categorias', 'sub_categorias'])) {
            // retorna esta mensagem caso tente submeter sem uma categoria ou sub_categoria
            return redirect()->back()->withErrors([
                'categorias' => 'É necessário escolher pelo menos uma categoria ou subcategoria.',
                'sub_categorias' => 'É necessário escolher pelo menos uma categoria ou subcategoria.',
            ])->withInput();
        }

        $cupom = Cupom::findOrFail($id);

        // Atualiza os campos do cupom
        $cupom->update([
            'nome_cupom' => $request->nome_cupom,
            'descricao_cupom' => $request->descricao_cupom,
            'data_expiracao' => $request->data_expiracao,
            'valor_desconto' => $request->valor_desconto,
            'tipo_desconto' => $request->tipo_desconto,
            'forma_desconto' => $request->forma_desconto,
        ]);

        // Associa palavras-chave, categorias e subcategorias (caso selecionadas)
        if ($request->forma_desconto == 1) {
            // Remove palavras antigas
            $cupom->palavras()->delete();

            // Adiciona novas palavras-chave e verifica se há pelo menos uma
            // se no request existir o campo palavras e for maior que zero o número de palavras, entra no if
            if ($request->has('palavras') && count($request->palavras) > 0) {
                // percorre as palavras enviadas através do request->palavras
                foreach ($request->palavras as $palavra) {
                    if (!empty($palavra)) { // Verifica se a palavra não está vazia
                        $cupom->palavras()->create(['palavra_chave' => $palavra]);
                    }
                }
            }

            // Verifica se nenhuma palavra-chave foi adicionada
            if ($cupom->palavras()->count() === 0) {
                // retorna essa mensagem caso não tenha nenhuma palavra chave adicionada quando a forma de desconto é 1
                return redirect()->back()->withErrors([
                    'palavras' => 'É necessário escolher pelo menos uma palavra-chave.',
                ])->withInput();
            }
        } else {
            // Remove palavras-chave se não for por palavras
            $cupom->palavras()->delete();
        }

        // Atualiza categorias
        if ($request->forma_desconto == 2) {
            if ($request->has('categorias')) {
                $cupom->categorias()->sync($request->categorias); // Atualiza as categorias
            } else {
                $cupom->categorias()->detach(); // Remove categorias se nenhuma for enviada
            }

            if ($request->has('sub_categorias')) {
                $cupom->subCategorias()->sync($request->sub_categorias); // Atualiza as subcategorias
            } else {
                $cupom->subCategorias()->detach(); // Remove subcategorias se nenhuma for enviada
            }
        }

        return redirect()->route('cupom.index')->with('sucesso', 'Cupom atualizado com sucesso!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $cupom = Cupom::findOrFail($id);
            $cupom->delete();
            return redirect()->route('cupom.index')->with('sucesso', 'Cupom deletado com sucesso!!!');
        } catch (\Exception $e) {

            return redirect()->route("cupom.index")->with('error', 'Erro ao deletar o cupom');
        }
    }

    public function aplicarDesconto(Produto $produto, Cupom $cupom)
    {
        $descontoAplicado = 0;

        if ($cupom->forma_desconto == 1) {
            // Desconto por palavra-chave
            $palavras = $cupom->palavras()->pluck('palavra')->toArray();
            foreach ($palavras as $palavra) {
                if (strpos($produto->descricao, $palavra) !== false) {
                    $descontoAplicado = $this->calcularDesconto($produto->preco, $cupom);
                    break;
                }
            }
        } elseif ($cupom->forma_desconto == 2) {
            // Desconto por categoria
            $categoriasCupom = $cupom->categorias()->pluck('categoria_id')->toArray();
            if (in_array($produto->categoria_id, $categoriasCupom)) {
                $descontoAplicado = $this->calcularDesconto($produto->preco, $cupom);
            }
        }

        return $descontoAplicado;
    }

    // calcula o desonto do cupom recebendo o atributo preço e o cupom  (com seu tipo de desconto (bruto ou porcentual))
    private function calcularDesconto($preco, $cupom)
    {
        if ($cupom->tipo_desconto) {
            // Percentual
            return $preco * ($cupom->valor_desconto / 100);
        } else {
            // Valor fixo
            return $cupom->valor_desconto;
        }
    }
}
