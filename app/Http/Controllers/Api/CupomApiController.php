<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Cupom;
use Exception;
use Illuminate\Http\Request;

class CupomApiController extends Controller
{
    public function index()
    {
        try {
            $cupons = Cupom::all();
            return response()->json([$cupons], 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao listar dados"], 500);
        }
    }

    public function show(string $id)
    {

        try {
            $cupom = Cupom::findOrFail($id);
            return response()->json($cupom, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Cupom não encontrado"], 404);
        }
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

        try {
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

            return response()->json(["message" => "Cupom criado com sucesso"], 200);
        } catch (Exception $e) {
            // return response()->json(["Erro" => $e->getMessage()], 500);

            return response()->json(["Erro" => "Erro ao criar cupom"], 500);
        }
    }

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

        try {
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

            return response()->json($cupom, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao atualizar cupom"], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $cupom = Cupom::findOrFail($id);
            $cupom->delete();
            return response()->json(["message" => "Cupom deletado com sucesso"], 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao deletar cupom"], 500);
        }
    }
}
