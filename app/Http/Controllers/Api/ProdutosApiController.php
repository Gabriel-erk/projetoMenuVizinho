<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\CategoriaProduto;
use App\Models\Produto;
use App\Models\SubCategoria;
use Exception;
use Illuminate\Http\Request;

class ProdutosApiController extends Controller
{
    public function index()
    {
        try {
            $produtos = Produto::all();
            $produtos = $produtos->map(function ($produto) {
                // asset($produto->fotos[0]->imagem), encontra essa informação e joga dentro de $produto->fotos[0]->imagem =
                // ou seja, o campo imagem, dentro de fotos na posição 0 dentro da váriavel produto que é uma instância da tabela produtos, irá receber o caminho BRUTO da imagem (ou seja, por ex: "imagem": "http://10.56.45.27/public/img/categoria-informatica.jpg",) 
                $produto->imagem = asset($produto->imagem);
                return $produto;
            });
            return response()->json($produtos, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao listar dados"], 500);
        }
    }

    public function cardapio()
    {
        try {
            $categorias = CategoriaProduto::with('produtos')->get();
            $categorias = $categorias->map(function ($categoria) {
                // Itera sobre os produtos de cada categoria e atualiza o campo 'imagem'
                 $categoria->produtos = $categoria->produtos->map(function ($produto) {
                    $produto->imagem = asset($produto->imagem);
                    return $produto;
                });
                return $categoria;
            });
        
            $subCategorias = SubCategoria::with('produtos')->get();
            $subCategorias = $subCategorias->map(function ($subCategoria) {
                // Itera sobre os produtos de cada subcategoria e atualiza o campo 'imagem' 
                // esta apontando um erro nesta linha, porém é apenas erro do intelissense, não da aplicação em si
                $subCategoria->produtos = $subCategoria->produtos->map(function ($produto) {
                    $produto->imagem = asset($produto->imagem);
                    return $produto;
                });
                return $subCategoria;
            });
        
            return response()->json(['categorias' => $categorias, 'subCategorias' => $subCategorias], 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => $e->getMessage()], 500);
        }
        
    }

    public function show(string $id)
    {
        try {
            $produto = Produto::findOrFail($id);
            return response()->json($produto, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Categoria não encontrada"], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nome' => 'required|string|max:25',
            'preco' => 'required|numeric|min:0',
            'descricao' => 'required|string',
            'info_nutricional' => 'required|string',
            'categoria_produto_id' => 'nullable|exists:categoria_produto,id',
            'sub_categoria_produto_id' => 'nullable|exists:sub_categoria,id',
        ]);

        try {
            // Verifica se uma imagem foi carregada
            if ($request->hasFile('imagem')) {
                $lojaId = 1;
                $imagemPath = $request->file('imagem')->store('imgLoja/produtos', 'public');

                Produto::create([
                    'imagem' => $imagemPath,
                    'nome' => $request->nome,
                    'preco' => $request->preco,
                    'descricao' => $request->descricao,
                    'info_nutricional' => $request->info_nutricional,
                    'categoria_produto_id' => $request->categoria_produto_id, // Categoria obrigatória
                    'sub_categoria_produto_id' => $request->sub_categoria_produto_id, // Subcategoria opcional
                    'loja_id' => $lojaId
                ]);

                return response()->json(["message" => "Produto criado com sucesso"], 200);
            }
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao criar produto"], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // ao atualizar posso querer manter a mesma img, caso não envie, fica a mesma
            'nome' => 'required|string|max:25',
            'preco' => 'required|numeric|min:0',
            'descricao' => 'required|string',
            'info_nutricional' => 'required|string',
            'categoria_produto_id' => 'nullable|exists:categoria_produto,id',
            'sub_categoria_produto_id' => 'nullable|exists:sub_categoria,id',
        ]);

        try {
            $produto = Produto::findOrFail($id);

            $produto->update([
                'imagem' => $request->hasFile('imagem') ? $request->file('imagem')->store('imgLoja/produtos', 'public') : $produto->imagem,
                'nome' => $request->nome,
                'preco' => $request->preco,
                'descricao' => $request->descricao,
                'info_nutricional' => $request->info_nutricional,
                'categoria_produto_id' => $request->categoria_produto_id,
                'sub_categoria_produto_id' => $request->sub_categoria_produto_id,
            ]);
            return response()->json($produto, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao atualizar produto"], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $produto = Produto::findOrFail($id);
            $produto->delete();
            return response()->json(["message" => "Produto deletado com sucesso"], 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao deletar produto"], 500);
        }
    }
}
